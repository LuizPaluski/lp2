# lp2

Landing page do I Simpósio Brasileiro de Neuromonitorização Veterinária, Anestesia
e Neurologia, 20, 21 e 22 de novembro de 2026, Faculdade UFAPE.

PHP puro, sem framework e sem dependência: a página monta a partir dos arrays de
`includes/dados.php` (preços, lotes, ids do carrinho) e `includes/conteudo.php`
(programação, corpo docente, dúvidas).

## Rodar local

```
php -S localhost:8000
```

## Publicar no site da faculdade

A página roda dos dois jeitos e decide sozinha qual cabeçalho usar: solta numa
pasta do Apache, usa `includes/header.php`; como view do CodeIgniter, detecta o
`site_url()` e usa `includes/header-sistema.php`, com o cabeçalho e o rodapé
institucionais. A pasta de publicação fica em `PASTA_NO_SITE`.

## Antes de abrir as inscrições

- `LOTE_VIGENTE` precisa ser trocado no mesmo dia em que os valores mudam no
  carrinho: a página não pode anunciar preço diferente do que o checkout cobra.
- O combo (68631, "Combo Simpósio + Workshop Neuromonitorização") e o workshop
  isolado (68633) já têm produto no carrinho. O simpósio isolado segue sem id,
  então essa inscrição vai para a secretaria no WhatsApp até a faculdade criar
  o produto. O 68634, "NEUROVET Summit 2026", foi o primeiro produto do combo e
  saiu daqui quando o 68631 foi criado com o nome das duas modalidades.
- O 68633 está cadastrado a R$ 1.250,00, que é o valor de 2º lote. Enquanto
  `LOTE_VIGENTE` for '1', a página anuncia R$ 950,00 e o carrinho cobra
  R$ 1.250,00: corrigir no carrinho antes de abrir as inscrições.
