<?php $lote = LOTE_VIGENTE; ?>
<div class="popup" id="popup-inscricao" role="dialog" aria-modal="true" aria-labelledby="popup-titulo">
    <div class="caixa">
        <div class="topo">
            <div>
                <h2 id="popup-titulo">Garantir minha vaga</h2>
                <p>NeuroVet Summit, 20, 21 e 22 de novembro de 2026</p>
            </div>
            <button type="button" class="fechar js-fechar" aria-label="Fechar">&times;</button>
        </div>

        <div class="corpo">
            <?php if (PEDE_CUPOM): ?>
                <div class="campo">
                    <label class="rotulo-campo" for="cupom">Cupom de aluno ou ex-aluno UFAPE (opcional)</label>
                    <input class="entrada" type="text" id="cupom" maxlength="40" placeholder="Digite o cupom" autocomplete="off">
                    <p class="aviso js-aviso-cupom"></p>
                </div>
            <?php endif; ?>

            <div class="campo">
                <label class="rotulo-campo" for="nome">Nome completo</label>
                <input class="entrada" type="text" id="nome" maxlength="120" placeholder="Seu nome" autocomplete="name">
            </div>

            <div class="campo">
                <label class="rotulo-campo" for="telefone">Telefone (WhatsApp)</label>
                <input class="entrada" type="tel" id="telefone" maxlength="15" placeholder="(00) 00000-0000" inputmode="tel" autocomplete="tel">
            </div>

            <div class="rodape-popup">
                <div class="total">
                    <span class="rotulo-total">Investimento (<?= $lote ?>º lote)</span>
                    <div class="numero js-total"></div>
                </div>
                <button type="button" class="bt bt-azul js-enviar" disabled></button>
            </div>
        </div>
    </div>
</div>

<script>
window.NEUROVET = <?= json_encode([
    'evento'        => EVENTO,
    'lote'          => $lote,
    'endpoint'      => $lp . '/inscricao.php',
    'endpointCupom' => $lp . '/cupom.php',
    'comCupom'      => PEDE_CUPOM ? CATEGORIA_COM_CUPOM : '',
    'whatsapp'      => WHATSAPP_SECRETARIA,
    'valor'         => valor_cheio($lote),
    'checkout'      => url_checkout(CATEGORIA_PADRAO, $lote),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
</script>
