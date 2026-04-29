document.addEventListener('DOMContentLoaded', () => {
    const API_URL = 'http://localhost:8000/pedidos';
    const produtoSelect = document.getElementById('produto');
    const qtdInput = document.getElementById('qtd');
    const btnAdicionar = document.getElementById('btn-adicionar');
    const btnFinalizar = document.getElementById('btn-finalizar');
    const btnAtualizar = document.getElementById('btn-atualizar');

    const lista = document.getElementById('lista');
    const pedidosSalvos = document.getElementById('pedidos-salvos');

    const subtotalEl = document.getElementById('subtotal');
    const descontoEl = document.getElementById('desconto');
    const taxaEl = document.getElementById('taxa');
    const totalEl = document.getElementById('total-final');

    const waCliente = document.getElementById('wa-cliente');
    const waEstabelecimento = document.getElementById('wa-estabelecimento');

    const TELEFONE_CLIENTE = '5511999999999';
    const TELEFONE_ESTABELECIMENTO = '5511888888888';
    const formatarMoeda = (valor) => `R$ ${Number(valor).toFixed(2).replace('.', ',')}`;

    const state = {
        itens: [],
        resumo: { subtotal: 0, desconto: 0, taxa: 0, total: 0 }
    };

    const renderResumo = () => {
        subtotalEl.textContent = formatarMoeda(state.resumo.subtotal);
        descontoEl.textContent = formatarMoeda(state.resumo.desconto);
        taxaEl.textContent = formatarMoeda(state.resumo.taxa);
        totalEl.textContent = formatarMoeda(state.resumo.total);
    };

    const renderItens = () => {
        lista.innerHTML = '';
        state.itens.forEach((item) => {
            const li = document.createElement('li');
            li.textContent = `${item.produto} x${item.quantidade}`;
            lista.appendChild(li);
        });
    };

    const carregarPedidos = async () => {
        pedidosSalvos.innerHTML = '<li>Carregando...</li>';
        try {
            const response = await fetch(API_URL);
            const pedidos = await response.json();
            pedidosSalvos.innerHTML = '';

            if (!Array.isArray(pedidos) || pedidos.length === 0) {
                pedidosSalvos.innerHTML = '<li>Nenhum pedido registrado.</li>';
                return;
            }

            pedidos.forEach((pedido) => {
                const li = document.createElement('li');
                li.textContent = `#${pedido.id} - ${formatarMoeda(pedido.total)} (${pedido.itens.length} item(ns))`;
                pedidosSalvos.appendChild(li);
            });
        } catch (error) {
            pedidosSalvos.innerHTML = '<li>Erro ao carregar pedidos.</li>';
            console.error(error);
        }
    };

    const atualizarWhatsAppLinks = (pedido) => {
        const mensagemCliente = `Pedido ${pedido.id} confirmado! Total: ${formatarMoeda(pedido.total)}.`;
        const mensagemEstab = `Novo pedido recebido: #${pedido.id}. Total: ${formatarMoeda(pedido.total)}.`;

        waCliente.href = `https://wa.me/${TELEFONE_CLIENTE}?text=${encodeURIComponent(mensagemCliente)}`;
        waEstabelecimento.href = `https://wa.me/${TELEFONE_ESTABELECIMENTO}?text=${encodeURIComponent(mensagemEstab)}`;
    };

    btnAdicionar.addEventListener('click', () => {
        const produto = produtoSelect.value;
        const quantidade = parseInt(qtdInput.value, 10);

        if (!quantidade || quantidade < 1) {
            alert('Informe uma quantidade válida.');
            return;
        }

        state.itens.push({ produto, quantidade });
        renderItens();
        qtdInput.value = '';
    });

    btnFinalizar.addEventListener('click', async () => {
        if (state.itens.length === 0) {
            alert('Adicione pelo menos um item.');
            return;
        }

        try {
            const response = await fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ itens: state.itens, desconto: 0 })
            });

            const pedidoCriado = await response.json();
            state.resumo = {
                subtotal: pedidoCriado.subtotal,
                desconto: pedidoCriado.desconto,
                taxa: pedidoCriado.taxa,
                total: pedidoCriado.total
            };

            renderResumo();
            atualizarWhatsAppLinks(pedidoCriado);
            carregarPedidos();
            alert(`Pedido #${pedidoCriado.id} finalizado com sucesso.`);
        } catch (error) {
            console.error(error);
            alert('Erro ao finalizar pedido.');
        }
    });

    btnAtualizar.addEventListener('click', carregarPedidos);

    renderResumo();
    carregarPedidos();
});
