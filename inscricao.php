<?php
// Recebe o lead do popup e repassa ao webhook. Os valores são recalculados aqui:
// o que vem do navegador é só a escolha, nunca o preço.

require __DIR__ . '/includes/dados.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$entrada = json_decode(file_get_contents('php://input'), true);

$categoria = $entrada['categoria'] ?? '';
$cupom     = trim($entrada['cupom'] ?? '');
$nome      = trim($entrada['nome'] ?? '');
$telefone  = trim($entrada['telefone'] ?? '');

if (!isset($categorias[$categoria])
    || mb_strlen($nome) < 3
    || strlen(preg_replace('/\D/', '', $telefone)) < 10) {
    http_response_code(422);
    exit;
}

$lote     = LOTE_VIGENTE;
$valor    = valor_cheio($lote);
$checkout = url_checkout(CATEGORIA_PADRAO, $lote);

$payload = [
    'evento'          => EVENTO,
    'nome'            => $nome,
    'telefone'        => $telefone,
    'categoria'       => $categoria,
    'categoria_label' => $categorias[$categoria],
    'lote'            => $lote,
    'total_centavos'  => $valor,
    'total_formatado' => formatar_brl($valor),
    'cupom'           => $cupom,
    'cupom_conferido' => $cupom !== '' && cupom_valido($cupom),
    'destino'         => $checkout === '' ? 'whatsapp' : 'checkout',
    'origem'          => mb_substr($entrada['origem'] ?? '', 0, 500),
    'enviado_em'      => date('c'),
];

if ($checkout !== '') {
    $payload['checkout_url'] = $checkout;
}

$ch = curl_init(WEBHOOK_INSCRICAO);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode($payload, JSON_UNESCAPED_UNICODE),
    CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 8,
]);
$resposta = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($resposta === false || $status >= 400) {
    error_log("neurovet: webhook respondeu $status na inscricao $categoria");
}

http_response_code(204);
