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

// O popup não pergunta o vínculo com a UFAPE: a inscrição sai sempre pelo valor
// cheio e o desconto de aluno e ex-aluno entra como cupom no carrinho.
const CATEGORIA_PADRAO = 'geral';
const CATEGORIA_COM_CUPOM = 'ufape';

// Enquanto o cupom não existir no carrinho, a página anuncia o desconto e o popup
// não pede o código: a condição é acertada com a secretaria.
const PEDE_CUPOM = false;

// Conferidos no servidor, em cupom.php, para a lista não ir parar no HTML. Lista
// vazia aceita qualquer código não vazio.
$cupons = [];

$categorias = [
    'geral' => 'Demais participantes',
    'ufape' => 'Aluno/ex-aluno UFAPE',
];

$precos = [
    'geral' => ['1' => 120000, '2' => 150000],
    'ufape' => ['1' => 84000,  '2' => 105000],
];

// Id do curso no carrinho da faculdade (cart/add/<id>). Toda inscrição sai pelo id
// de valor cheio; o desconto de aluno e ex-aluno entra como cupom no carrinho.
// Enquanto o id estiver vazio, a inscrição vai para a secretaria pelo WhatsApp.
$checkout_ids = [
    'geral' => '68634',
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

// Valor que a página anuncia e que o checkout cobra, sem o desconto de vínculo.
function valor_cheio(string $lote): int
{
    return valor_inscricao(CATEGORIA_PADRAO, $lote);
}

// O percentual sai da própria tabela para não haver dois números a manter.
function desconto_em_texto(string $lote): string
{
    $percentual = (int) round((1 - valor_inscricao(CATEGORIA_COM_CUPOM, $lote) / valor_cheio($lote)) * 100);

    return $percentual . '% de desconto usando o cupom';
}

function cupom_valido(string $codigo): bool
{
    global $cupons;

    if ($cupons === []) {
        return trim($codigo) !== '';
    }

    return in_array(strtoupper(trim($codigo)), array_map('strtoupper', $cupons), true);
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
