<?php
// Configuração e tabela de preços do NeuroVet Summit.
// Valores em centavos para não arrastar erro de arredondamento.

date_default_timezone_set('America/Sao_Paulo');

const EVENTO = 'neurovet-summit';

// Pasta em que a página fica publicada dentro do site da faculdade.
const PASTA_NO_SITE = 'neurovet-summit';

// Lote vigente na tabela de preços. Trocar para '2' no mesmo dia em que os valores
// forem atualizados no carrinho da faculdade: a página não pode anunciar um preço
// diferente do que o checkout cobra.
const LOTE_VIGENTE = '1';

const CHECKOUT_BASE = 'https://faculdade.ufape.com.br/cart/add';

const WHATSAPP_SECRETARIA = '5511974928443';
const WEBHOOK_INSCRICAO = 'https://webhook.thegrowthhub.app.br/webhook/4ded9a37-413e-4c04-a6f0-ac3d554bb0a7';

// O popup não pergunta o vínculo com a UFAPE: mostra o valor de demais participantes.
// Aluno e ex-aluno acertam a condição com a secretaria.
const CATEGORIA_PADRAO = 'geral';

$categorias = [
    'geral' => 'Demais participantes',
    'ufape' => 'Aluno/ex-aluno UFAPE',
];

$precos = [
    'geral' => ['1' => 120000, '2' => 150000],
    'ufape' => ['1' => 84000,  '2' => 105000],
];

// Id de cada condição no carrinho da faculdade, o mesmo esquema do simpósio de
// cardiologia (cart/add/<id>). Enquanto o id estiver vazio, a inscrição daquela
// condição vai para a secretaria pelo WhatsApp em vez do checkout.
$checkout_ids = [
    'geral' => '',
    'ufape' => '',
];

function formatar_brl(int $centavos): string
{
    return 'R$ ' . number_format($centavos / 100, 2, ',', '.');
}

function valor_inscricao(string $categoria, string $lote): int
{
    global $precos;

    return $precos[$categoria][$lote];
}

// UTMs que marcam a inscrição como vinda desta landing page.
function utm_checkout(string $lote): string
{
    return http_build_query([
        'utm_source'   => 'lp-neurovet-summit',
        'utm_medium'   => 'popup-inscricao',
        'utm_campaign' => "neurovet-{$lote}o-lote",
    ]);
}

function url_checkout(string $categoria, string $lote): string
{
    global $checkout_ids;

    $id = $checkout_ids[$categoria];

    return $id === '' ? '' : CHECKOUT_BASE . '/' . $id . '?' . utm_checkout($lote);
}
