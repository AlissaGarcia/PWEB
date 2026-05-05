document.addEventListener('DOMContentLoaded', () => {
<<<<<<< HEAD
    const nomeCliente = document.getElementById('nome-cliente');
    const telefoneCliente = document.getElementById('telefone-cliente');
=======
    const API_URL = 'http://localhost:8000/pedidos';
>>>>>>> cefe934fdef0cfe1a78f321fa190599de28db70c
    const produtoSelect = document.getElementById('produto');
    const qtdInput = document.getElementById('qtd');
    const descontoInput = document.getElementById('desconto-valor');
    const btnAdicionar = document.getElementById('btn-adicionar');
    const btnFinalizar = document.getElementById('btn-finalizar');
    const btnAtualizar = document.getElementById('btn-atualizar');

    const lista = document.getElementById('lista');
<<<<<<< HEAD
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
=======
    const pedidosSalvos = document.getElementById('pedidos-salvos');

    const subtotalEl = document.getElementById('subtotal');
    const descontoEl = document.getElementById('desconto');
    const taxaEl = document.getElementById('taxa');
    const totalEl = document.getElementById('total-final');
>>>>>>> cefe934fdef0cfe1a78f321fa190599de28db70c

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

<<<<<<< HEAD
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
=======
    btnAdicionar.addEventListener('click', () => {
        const produto = produtoSelect.value;
        const quantidade = parseInt(qtdInput.value, 10);

        if (!quantidade || quantidade < 1) {
            alert('Informe uma quantidade válida.');
            return;
        }

        state.itens.push({ produto, quantidade });
        renderItens();
>>>>>>> cefe934fdef0cfe1a78f321fa190599de28db70c
        qtdInput.value = '';
    });

    descontoInput.addEventListener('input', () => {
        desconto = parseFloat(descontoInput.value) || 0;
        atualizarResumo();
    });

    btnFinalizar.addEventListener('click', async () => {
<<<<<<< HEAD
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
=======
        if (state.itens.length === 0) {
            alert('Adicione pelo menos um item.');
            return;
        }
>>>>>>> cefe934fdef0cfe1a78f321fa190599de28db70c

        try {
            const response = await fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ itens: state.itens, desconto: 0 })
            });
<<<<<<< HEAD
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
=======

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
>>>>>>> cefe934fdef0cfe1a78f321fa190599de28db70c
        } catch (error) {
            console.error(error);
            alert('Erro ao finalizar pedido.');
        }
    });

<<<<<<< HEAD
    btnListar.addEventListener('click', listarPedidos);

    carregarProdutos();
});
=======
    btnAtualizar.addEventListener('click', carregarPedidos);
>>>>>>> cefe934fdef0cfe1a78f321fa190599de28db70c

    renderResumo();
    carregarPedidos();
});
