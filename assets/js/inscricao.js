(function () {
    const dados = window.NEUROVET;
    const popup = document.getElementById('popup-inscricao');
    if (!dados || !popup) return;

    const nome = popup.querySelector('#nome');
    const telefone = popup.querySelector('#telefone');
    const btEnviar = popup.querySelector('.js-enviar');

    let categoria = null;
    let enviando = false;

    function brl(centavos) {
        return (centavos / 100).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    }

    function urlWhatsapp() {
        const linhas = [
            'Olá! Quero me inscrever no NeuroVet Summit (20, 21 e 22 de novembro).',
            '',
            'Nome: ' + nome.value.trim(),
            'Telefone: ' + telefone.value.trim(),
            'Condição: ' + dados.categorias[categoria],
            'Lote: ' + dados.lote + 'º',
            'Investimento: ' + brl(dados.valores[categoria])
        ];
        return 'https://wa.me/' + dados.whatsapp + '?text=' + encodeURIComponent(linhas.join('\n'));
    }

    // com o produto criado no carrinho a inscrição vai direto ao checkout; sem ele,
    // segue pela secretaria
    function destino() {
        return dados.checkouts[categoria] || urlWhatsapp();
    }

    function rotuloBotao() {
        return dados.checkouts[categoria] ? 'Ir para o checkout' : 'Falar com a secretaria';
    }

    function dadosPreenchidos() {
        return nome.value.trim().length >= 3 && telefone.value.replace(/\D/g, '').length >= 10;
    }

    function mascaraTelefone(valor) {
        const d = valor.replace(/\D/g, '').slice(0, 11);
        if (d.length <= 2) return d.length ? '(' + d : '';
        if (d.length <= 6) return '(' + d.slice(0, 2) + ') ' + d.slice(2);
        if (d.length <= 10) return '(' + d.slice(0, 2) + ') ' + d.slice(2, 6) + '-' + d.slice(6);
        return '(' + d.slice(0, 2) + ') ' + d.slice(2, 7) + '-' + d.slice(7);
    }

    function abrir(id) {
        categoria = id;
        popup.querySelector('.js-condicao').textContent = dados.categorias[id];
        popup.querySelector('.js-valor').textContent = brl(dados.valores[id]);
        btEnviar.textContent = rotuloBotao();
        popup.classList.add('aberto');
        document.body.style.overflow = 'hidden';
        nome.focus();
    }

    function fechar() {
        popup.classList.remove('aberto');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.js-abrir-popup').forEach((bt) => {
        bt.addEventListener('click', () => abrir(bt.dataset.categoria));
    });

    popup.querySelectorAll('.js-fechar').forEach((bt) => bt.addEventListener('click', fechar));

    popup.addEventListener('click', (e) => {
        if (e.target === popup) fechar();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && popup.classList.contains('aberto')) fechar();
    });

    telefone.addEventListener('input', () => {
        telefone.value = mascaraTelefone(telefone.value);
    });

    [nome, telefone].forEach((campo) => {
        campo.addEventListener('input', () => {
            btEnviar.disabled = !dadosPreenchidos();
        });
    });

    btEnviar.addEventListener('click', () => {
        if (enviando || !dadosPreenchidos()) return;
        enviando = true;
        btEnviar.textContent = 'Enviando...';

        const lead = JSON.stringify({
            evento: dados.evento,
            nome: nome.value.trim(),
            telefone: telefone.value.trim(),
            categoria: categoria,
            origem: window.location.href
        });

        // sendBeacon porque a página sai do ar em seguida: um fetch comum seria abortado.
        navigator.sendBeacon(dados.endpoint, new Blob([lead], { type: 'application/json' }));

        window.location.href = destino();
    });
})();
