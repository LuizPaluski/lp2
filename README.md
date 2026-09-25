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
- As três modalidades têm produto no carrinho, conferidos com os valores de 1º
  lote em 25/09/2026: 68631 "Combo Simpósio + Workshop Neuromonitorização" a
  R$ 1.200,00, 68634 "Simpósio Brasileiro de Neuromonitorização Veterinária" a
  R$ 400,00 e 68633 "Workshop Neuromonitorização" a R$ 950,00. Na virada do
  lote, os três precisam ser atualizados lá junto com `LOTE_VIGENTE` aqui.
- O cupom de aluno e ex-aluno precisa dar os 20% de `DESCONTO_EX_ALUNO`, que é o
  que a página anuncia. No 1º lote isso é R$ 960,00 no combo, R$ 320,00 no
  simpósio e R$ 760,00 no workshop; no 2º, R$ 1.200,00, R$ 400,00 e R$ 1.000,00.
