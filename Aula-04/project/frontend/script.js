document.addEventListener('DOMContentLoaded', () => {
    const nomeCliente = document.getElementById('nome-cliente');
    const telefoneCliente = document.getElementById('telefone-cliente');
    const produtoSelect = document.getElementById('produto');
    const qtdInput = document.getElementById('qtd');
    const descontoInput = document.getElementById('desconto-valor');
    const btnAdicionar = document.getElementById('btn-adicionar');
    const btnFinalizar = document.getElementById('btn-finalizar');
    const lista = document.getElementById('lista');
    const subtotalSpan = document.getElementById('subtotal');
    const descontoSpan = document.getElementById('desconto');
    const taxaSpan = document.getElementById('taxa');
    const totalSpan = document.getElementById('total-final');
    const listaPedidos = document.getElementById('lista-pedidos');
    const btnListar = document.getElementById('btn-listar');

    let itens = [];
    let subtotal = 0;
    let desconto = 0;
    const taxa = 5.00;
    let produtos = [];

    const carregarProdutos = async () => {
        try {
            const response = await fetch('http://localhost:8000/produtos');
            produtos = await response.json();
            produtoSelect.innerHTML = '<option value="">Selecione um produto</option>';
            produtos.forEach(prod => {
                const option = document.createElement('option');
                option.value = prod.nome.toLowerCase();
                option.textContent = `${prod.nome} - R$ ${prod.preco.toFixed(2).replace('.', ',')}`;
                produtoSelect.appendChild(option);
            });
        } catch (error) {
            console.error('Erro ao carregar produtos:', error);
        }
    };

    const atualizarResumo = () => {
        subtotalSpan.textContent = subtotal.toFixed(2).replace('.', ',');
        descontoSpan.textContent = desconto.toFixed(2).replace('.', ',');
        taxaSpan.textContent = taxa.toFixed(2).replace('.', ',');
        const total = subtotal - desconto + taxa;
        totalSpan.textContent = total.toFixed(2).replace('.', ',');
    };

    const listarPedidos = async () => {
        try {
            const response = await fetch('http://localhost:8000/pedidos');
            const pedidos = await response.json();
            listaPedidos.innerHTML = '';
            pedidos.forEach(pedido => {
                const li = document.createElement('li');
                li.innerHTML = `Pedido #${pedido.id} - Cliente: ${pedido.cliente || 'N/A'} - Total: R$ ${pedido.total.toFixed(2).replace('.', ',')} <button onclick="deletarPedido('${pedido.id}')">Deletar</button>`;
                listaPedidos.appendChild(li);
            });
        } catch (error) {
            console.error('Erro ao listar pedidos:', error);
        }
    };

    window.deletarPedido = async (id) => {
        try {
            await fetch(`http://localhost:8000/pedidos/${id}`, { method: 'DELETE' });
            alert('Pedido deletado!');
            listarPedidos();
        } catch (error) {
            console.error('Erro ao deletar:', error);
        }
    };

    btnAdicionar.addEventListener('click', () => {
        const produtoNome = produtoSelect.value;
        const qtd = parseInt(qtdInput.value);
        if (!produtoNome || !qtd || qtd < 1) return;

        const produto = produtos.find(p => p.nome.toLowerCase() === produtoNome);
        if (!produto) return;

        const itemSubtotal = produto.preco * qtd;
        subtotal += itemSubtotal;

        itens.push({ produto: produtoNome, qtd, preco: produto.preco, subtotal: itemSubtotal });

        const li = document.createElement('li');
        li.textContent = `${produto.nome} x${qtd} - R$ ${itemSubtotal.toFixed(2).replace('.', ',')}`;
        lista.appendChild(li);

        atualizarResumo();
        qtdInput.value = '';
    });

    descontoInput.addEventListener('input', () => {
        desconto = parseFloat(descontoInput.value) || 0;
        atualizarResumo();
    });

    btnFinalizar.addEventListener('click', async () => {
        if (itens.length === 0 || !nomeCliente.value || !telefoneCliente.value) {
            alert('Preencha todos os campos obrigatórios!');
            return;
        }

        const pedido = {
            cliente: nomeCliente.value,
            telefone: telefoneCliente.value,
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
            const mensagem = `Olá ${data.cliente}, seu pedido ${data.id} foi confirmado. Total: R$ ${data.total.toFixed(2).replace('.', ',')}`;
            const linkCliente = `https://wa.me/55${data.telefone.replace(/\D/g, '')}?text=${encodeURIComponent(mensagem)}`;
            const linkEstabelecimento = `https://wa.me/5511888888888?text=${encodeURIComponent('Novo pedido de ' + data.cliente + ': ' + mensagem)}`;
            window.open(linkCliente, '_blank');
            window.open(linkEstabelecimento, '_blank');
            // Limpar
            itens = [];
            subtotal = 0;
            desconto = 0;
            lista.innerHTML = '';
            nomeCliente.value = '';
            telefoneCliente.value = '';
            descontoInput.value = '';
            atualizarResumo();
        } catch (error) {
            console.error('Erro:', error);
        }
    });

    btnListar.addEventListener('click', listarPedidos);

    carregarProdutos();
});

