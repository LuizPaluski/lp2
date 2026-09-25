(function () {
    const dados = window.NEUROVET;
    const popup = document.getElementById('popup-inscricao');
    if (!dados || !popup) return;

    const nome = popup.querySelector('#nome');
    const telefone = popup.querySelector('#telefone');
    const cupom = popup.querySelector('#cupom');
    const avisoCupom = popup.querySelector('.js-aviso-cupom');
    const btEnviar = popup.querySelector('.js-enviar');

    let modalidade = null;
    let enviando = false;

    function escolhida() {
        return dados.modalidades[modalidade];
    }

    function temCupom() {
        return cupom !== null && cupom.value.trim() !== '';
    }

    // sem a escolha de vínculo no popup, quem informa o cupom é aluno ou ex-aluno
    function categoria() {
        return temCupom() ? dados.comCupom : 'geral';
    }

    function brl(centavos) {
        return (centavos / 100).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    }

    function urlWhatsapp() {
        const linhas = [
            'Olá! Quero me inscrever no Simpósio Brasileiro de Neuromonitorização Veterinária (20, 21 e 22 de novembro).',
            '',
            'Nome: ' + nome.value.trim(),
            'Telefone: ' + telefone.value.trim(),
            'Modalidade: ' + escolhida().titulo,
            'Lote: ' + dados.lote + 'º',
            'Investimento: ' + brl(escolhida().preco)
        ];
        if (temCupom()) linhas.push('Cupom: ' + cupom.value.trim());
        return 'https://wa.me/' + dados.whatsapp + '?text=' + encodeURIComponent(linhas.join('\n'));
    }

    // com o produto criado no carrinho a inscrição vai direto ao checkout; sem ele,
    // segue pela secretaria
    function destino() {
        return escolhida().checkout || urlWhatsapp();
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
        modalidade = id;
        popup.querySelector('.js-modalidade').textContent = escolhida().titulo;
        popup.querySelector('.js-total').textContent = brl(escolhida().preco);
        btEnviar.textContent = escolhida().checkout ? 'Ir para o checkout' : 'Falar com a secretaria';
        popup.classList.add('aberto');
        document.body.style.overflow = 'hidden';
        nome.focus();
    }

    function fechar() {
        popup.classList.remove('aberto');
        document.body.style.overflow = '';
    }

    // a lista de cupons fica no servidor, então a conferência é feita lá
    function conferirCupom() {
        return fetch(dados.endpointCupom, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ codigo: cupom.value })
        }).then((r) => r.json());
    }

    function seguir() {
        enviando = true;
        btEnviar.textContent = 'Enviando...';

        const lead = JSON.stringify({
            evento: dados.evento,
            nome: nome.value.trim(),
            telefone: telefone.value.trim(),
            modalidade: modalidade,
            categoria: categoria(),
            cupom: temCupom() ? cupom.value.trim() : '',
            origem: window.location.href
        });

        // sendBeacon porque a página sai do ar em seguida: um fetch comum seria abortado.
        navigator.sendBeacon(dados.endpoint, new Blob([lead], { type: 'application/json' }));

        window.location.href = destino();
    }

    document.querySelectorAll('.js-abrir-popup').forEach((bt) => {
        bt.addEventListener('click', () => abrir(bt.dataset.modalidade));
    });

    popup.querySelectorAll('.js-fechar').forEach((bt) => bt.addEventListener('click', fechar));

    popup.addEventListener('click', (e) => {
        if (e.target === popup) fechar();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && popup.classList.contains('aberto')) fechar();
    });

    // quem volta do checkout pelo botão do navegador recebe a página do cache no estado
    // em que saiu: popup aberto e botão preso em "Enviando...". Aqui ele volta ao normal.
    window.addEventListener('pageshow', (e) => {
        if (!e.persisted) return;
        enviando = false;
        fechar();
    });

    if (cupom) {
        cupom.addEventListener('input', () => {
            avisoCupom.textContent = '';
        });
    }

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

        // cupom em branco é o caminho normal: só quem tem vínculo com a UFAPE preenche
        if (!temCupom()) {
            seguir();
            return;
        }

        btEnviar.disabled = true;
        conferirCupom()
            .then((resposta) => {
                if (resposta.valido) {
                    seguir();
                    return;
                }
                avisoCupom.textContent = 'Cupom não encontrado. Confira o código com a secretaria.';
                cupom.focus();
                btEnviar.disabled = false;
            })
            // sem resposta do servidor o cupom segue para a conferência no checkout
            .catch(seguir);
    });
})();
