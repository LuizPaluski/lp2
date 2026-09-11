<?php $lote = LOTE_VIGENTE; ?>
<div class="popup" id="popup-inscricao" role="dialog" aria-modal="true" aria-labelledby="popup-titulo">
    <div class="caixa">
        <div class="topo">
            <div>
                <h2 id="popup-titulo">Garantir minha vaga</h2>
                <p>Condição: <strong class="js-condicao"></strong></p>
            </div>
            <button type="button" class="fechar js-fechar" aria-label="Fechar">&times;</button>
        </div>

        <div class="corpo">
            <div class="resumo">
                <div><strong>NeuroVet Summit</strong>, 20, 21 e 22 de novembro de 2026</div>
                <div><strong>Investimento (<?= $lote ?>º lote):</strong> <span class="js-valor"></span></div>
            </div>

            <div class="campo">
                <label class="rotulo-campo" for="nome">Nome completo</label>
                <input class="entrada" type="text" id="nome" maxlength="120" placeholder="Seu nome" autocomplete="name">
            </div>

            <div class="campo">
                <label class="rotulo-campo" for="telefone">Telefone (WhatsApp)</label>
                <input class="entrada" type="tel" id="telefone" maxlength="15" placeholder="(00) 00000-0000" inputmode="tel" autocomplete="tel">
            </div>

            <div class="rodape-popup">
                <button type="button" class="bt-texto js-fechar">Cancelar</button>
                <button type="button" class="bt bt-azul js-enviar" disabled></button>
            </div>
        </div>
    </div>
</div>

<script>
window.NEUROVET = <?= json_encode([
    'evento'       => EVENTO,
    'lote'         => $lote,
    'endpoint'     => $lp . '/inscricao.php',
    'whatsapp'     => WHATSAPP_SECRETARIA,
    'categorias'   => $categorias,
    'valores'      => array_map(fn($p) => $p[$lote], $precos),
    'checkouts'    => array_map(fn($id) => url_checkout($id, $lote), array_combine(array_keys($categorias), array_keys($categorias))),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
</script>
