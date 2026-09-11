<?php
// Card do corpo docente. Espera $p (nome, tema, foto) e $lp definidos por quem inclui.
// Convidado ainda não indicado é uma vaga, não uma pessoa, então fica sem retrato;
// quem tem nome e ainda não mandou foto entra com as iniciais.
$vaga = str_starts_with($p['nome'], 'Convidado');
$tem_cv = isset($curriculos[$p['nome']]);
?>
<article class="lp-card card-palestrante<?= $p['foto'] || !$vaga ? '' : ' sem-foto' ?>">
    <?php if ($p['foto']): ?>
        <img src="<?= $lp ?>/assets/img/<?= $p['foto'] ?>" alt="Retrato de <?= $p['nome'] ?>" loading="lazy">
    <?php elseif (!$vaga): ?>
        <span class="sem-retrato" aria-hidden="true"><?= iniciais($p['nome']) ?></span>
    <?php endif; ?>
    <h3><?= $p['nome'] ?></h3>
    <p><?= $p['tema'] ?></p>
    <?php if ($tem_cv): ?>
        <button type="button" class="ver-cv js-abrir-cv" data-quem="<?= $p['nome'] ?>" data-tema="<?= $p['tema'] ?>">Ver currículo</button>
    <?php endif; ?>
</article>
