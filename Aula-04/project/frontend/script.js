document.addEventListener('DOMContentLoaded', () => {
    const produtoSelect = document.getElementById('produto');
    const qtdInput = document.getElementById('qtd');
    const btnAdicionar = document.getElementById('btn-adicionar');
    const btnFinalizar = document.getElementById('btn-finalizar');
    const lista = document.getElementById('lista');
    const subtotalSpan = document.getElementById('subtotal');
    const descontoSpan = document.getElementById('desconto');
    const taxaSpan = document.getElementById('taxa');
    const totalSpan = document.getElementById('total-final');

    let itens = [];
    let subtotal = 0;
    let desconto = 0;
    const taxa = 5.00;

    const atualizarResumo = () => {
        subtotalSpan.textContent = subtotal.toFixed(2).replace('.', ',');
        descontoSpan.textContent = desconto.toFixed(2).replace('.', ',');
        taxaSpan.textContent = taxa.toFixed(2).replace('.', ',');
        const total = subtotal - desconto + taxa;
        totalSpan.textContent = total.toFixed(2).replace('.', ',');
    };

    btnAdicionar.addEventListener('click', () => {
        const produto = produtoSelect.value;
        const qtd = parseInt(qtdInput.value);
        if (!qtd || qtd < 1) return;

        const preco = getPreco(produto);
        const itemSubtotal = preco * qtd;
        subtotal += itemSubtotal;

        itens.push({ produto, qtd, preco, subtotal: itemSubtotal });

        const li = document.createElement('li');
        li.textContent = `${produto} x${qtd} - R$ ${itemSubtotal.toFixed(2).replace('.', ',')}`;
        lista.appendChild(li);

        atualizarResumo();
        qtdInput.value = '';
    });

    btnFinalizar.addEventListener('click', async () => {
        if (itens.length === 0) return;

        const pedido = {
            itens: itens.map(item => ({ produto: item.produto, quantidade: item.qtd })),
            desconto: desconto
        };

        try {
            const response = await fetch('http://localhost:8000/pedidos', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(pedido)
            });
            const data = await response.json();
            alert(`Pedido criado! ID: ${data.id}`);
            // Gerar link WhatsApp
            const mensagem = `Pedido ${data.id} - Total: R$ ${data.total.toFixed(2).replace('.', ',')}`;
            const linkCliente = `https://wa.me/5511999999999?text=${encodeURIComponent(mensagem)}`;
            const linkEstabelecimento = `https://wa.me/5511888888888?text=${encodeURIComponent('Novo pedido: ' + mensagem)}`;
            window.open(linkCliente, '_blank');
            window.open(linkEstabelecimento, '_blank');
        } catch (error) {
            console.error('Erro:', error);
        }
    });

    const getPreco = (produto) => {
        const precos = {
            pastel: 5.00,
            caldo: 8.00,
            refrigerante: 4.00,
            suco: 3.00
        };
        return precos[produto] || 0;
    };
});

