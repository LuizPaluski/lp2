<?php
require __DIR__ . '/includes/dados.php';
require __DIR__ . '/includes/conteudo.php';

$lote = LOTE_VIGENTE;
$outro_lote = $lote === '1' ? '2' : '1';

// Dentro do sistema da faculdade a página é uma view do CodeIgniter e usa o cabeçalho
// institucional; solta no Apache, usa o cabeçalho próprio desta pasta. Se o controller
// que carregar esta view já montar header e footer, apague os dois require abaixo.
$no_sistema = function_exists('site_url');
$lp = $no_sistema ? rtrim(base_url(PASTA_NO_SITE), '/') : '.';

// O banner do evento entra quando a coordenação enviar a arte.
$banner = file_exists(__DIR__ . '/assets/img/hero-neurovet.jpg') ? 'hero-neurovet.jpg' : '';

require __DIR__ . ($no_sistema ? '/includes/header-sistema.php' : '/includes/header.php');
?>

<section class="hero">
    <div class="lp-container<?= $banner ? '' : ' sem-foto' ?>">
        <div>
            <span class="selo-evento">20, 21 e 22 de novembro de 2026</span>
            <h1>I Simpósio Brasileiro de Neuromonitorização Veterinária</h1>
            <p class="subtitulo">Anestesia e Neurologia</p>
            <p class="tema">Neuromonitorização, Nocicepção e Inteligência Anestésica</p>
            <p class="lema">Do cérebro à analgesia: monitorando aquilo que realmente importa.</p>
            <p class="chamada">
                Um simpósio para o médico veterinário interpretar o que existe por trás dos números, integrar EEG,
                hipnose, nocicepção, perfusão e fisiologia e transformar monitorização avançada em decisões
                anestésicas mais precisas no centro cirúrgico e na UTI.
            </p>
            <p class="publico">
                <strong>Público alvo:</strong> médicos veterinários, anestesiologistas, intensivistas, residentes,
                pós-graduandos e profissionais interessados em monitorização avançada, anestesia de precisão e
                cuidado do paciente crítico.
            </p>
            <ul class="selos">
                <?php foreach ($selos as $selo): ?>
                    <li><?= $selo ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="bts">
                <a class="bt bt-claro" href="#investimento">Garantir minha vaga</a>
                <a class="bt bt-linha" href="#programacao">Ver programação</a>
            </div>
        </div>
        <?php if ($banner): ?>
            <div class="foto">
                <img src="<?= $lp ?>/assets/img/<?= $banner ?>" alt="I Simpósio Brasileiro de Neuromonitorização Veterinária, Anestesia e Neurologia">
            </div>
        <?php endif; ?>
    </div>
</section>

<div class="faixa-numeros">
    <dl class="lp-container">
        <?php foreach ($numeros as $rotulo => $valor): ?>
            <div>
                <dt><?= $rotulo ?></dt>
                <dd><?= $valor ?></dd>
            </div>
        <?php endforeach; ?>
    </dl>
</div>

<section class="secao">
    <div class="lp-container">
        <div class="publico-alvo">
            <div>
                <span class="chapeu">Para quem é</span>
                <h2>Para quem decide olhando além do número</h2>
                <p>
                    Voltado a médicos veterinários, anestesiologistas, intensivistas, residentes, pós-graduandos e
                    profissionais interessados em monitorização avançada, anestesia de precisão e cuidado do
                    paciente crítico.
                </p>
                <p>
                    A programação aproxima neurofisiologia e tecnologia da rotina clínica de cães, gatos, equinos e
                    bovinos, tanto no centro cirúrgico quanto na UTI. O objetivo é ensinar o participante a
                    interpretar EEG e índices derivados de forma clínica, reconhecer limitações e artefatos, integrar
                    diferentes tecnologias de monitorização e usar os dados para responder perguntas práticas sobre
                    hipnose, nocicepção, analgesia, despertar, sedação e risco de deterioração.
                </p>
            </div>
            <ul class="lista-diferenciais">
                <?php foreach ($diferenciais as $item): ?>
                    <li><?= $item ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<section class="secao cinza" id="programacao">
    <div class="lp-container">
        <h2 class="titulo-secao">Programação <span>científica</span></h2>
        <p class="intro">
            Dois dias de imersão científica e um domingo inteiro de workshop. Professores e horários seguem sujeitos
            a confirmação antes da divulgação.
        </p>

        <?php foreach ($programacao as $dia): ?>
            <h3 class="dia"><?= $dia['data'] ?> <span><?= $dia['tema'] ?></span></h3>
            <div class="agenda">
                <?php foreach ($dia['linhas'] as [$hora, $atividade, $quem, $foco]): ?>
                    <div class="linha">
                        <span class="hora"><?= $hora ?></span>
                        <span class="atividade">
                            <?= $atividade ?>
                            <?php if ($foco): ?><span class="foco"><?= $foco ?></span><?php endif; ?>
                        </span>
                        <span class="palestrante">
                            <?php foreach (retratos_da_linha($quem) as $retrato): ?>
                                <img src="<?= $lp ?>/assets/img/<?= $retrato ?>" alt="" loading="lazy">
                            <?php endforeach; ?>
                            <?= $quem ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="secao" id="workshop">
    <div class="lp-container">
        <span class="chapeu"><?= $workshop['data'] ?></span>
        <h2 class="titulo-secao">Workshop <span><?= $workshop['tema'] ?></span></h2>
        <p class="intro"><?= $workshop['descricao'] ?></p>

        <div class="agenda">
            <?php foreach ($workshop['linhas'] as [$hora, $atividade, $quem, $foco]): ?>
                <div class="linha">
                    <span class="hora"><?= $hora ?></span>
                    <span class="atividade">
                        <?= $atividade ?>
                        <?php if ($foco): ?><span class="foco"><?= $foco ?></span><?php endif; ?>
                    </span>
                    <span class="palestrante">
                        <?php foreach (retratos_da_linha($quem) as $retrato): ?>
                            <img src="<?= $lp ?>/assets/img/<?= $retrato ?>" alt="" loading="lazy">
                        <?php endforeach; ?>
                        <?= $quem ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="secao cinza" id="investimento">
    <div class="lp-container">
        <h2 class="titulo-secao">Escolha a sua <span>modalidade</span></h2>
        <p class="intro">
            Valores do <?= $lote === '1' ? 'primeiro' : 'segundo' ?> lote, sujeitos a confirmação das datas de virada.
        </p>

        <div class="grade-precos">
            <?php foreach ($modalidades as $id => $modalidade): ?>
                <article class="lp-card card-preco">
                    <h3><?= $modalidade['titulo'] ?></h3>
                    <p class="nota"><?= $modalidade['nota'] ?></p>
                    <div class="valores">
                        <?php foreach ($categorias as $cat_id => $cat_label): ?>
                            <div>
                                <p class="publico<?= $cat_id === CATEGORIA_COM_CUPOM ? ' forte' : '' ?>"><?= $cat_label ?></p>
                                <?php if ($cat_id === CATEGORIA_COM_CUPOM): ?>
                                    <p class="preco">
                                        <span class="selo-desconto"><?= desconto_em_texto($id, $lote) ?></span>
                                    </p>
                                <?php else: ?>
                                    <p class="preco">
                                        <b><?= formatar_brl(valor_cheio($id, $lote)) ?></b>
                                        <?php if ($lote === '1'): ?>
                                            <s>2º lote <?= formatar_brl(valor_cheio($id, $outro_lote)) ?></s>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="bt js-abrir-popup" data-modalidade="<?= $id ?>">Quero esta modalidade</button>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="inclusos">
            <?php foreach ($inclusos as $item): ?>
                <p><?= $item ?></p>
            <?php endforeach; ?>
        </div>

        <p class="aviso-lote">
            Aluno e ex-aluno UFAPE comprovam o vínculo com a secretaria para garantir a condição especial.
        </p>
    </div>
</section>

<section class="secao" id="palestrantes">
    <div class="lp-container">
        <span class="chapeu">Corpo docente</span>
        <h2 class="titulo-secao">Palestrantes <span>confirmados</span></h2>
        <div class="grade-palestrantes">
            <?php foreach ($palestrantes as $p): ?>
                <?php require __DIR__ . '/includes/card-palestrante.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="secao cinza" id="faq">
    <div class="lp-container">
        <h2 class="titulo-secao">Dúvidas <span>frequentes</span></h2>
        <div class="faq">
            <?php foreach ($faq as [$pergunta, $resposta]): ?>
                <details>
                    <summary><?= $pergunta ?></summary>
                    <p class="resposta"><?= $resposta ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="chamada-final">
    <div class="lp-container">
        <h2>Do cérebro à analgesia, monitorando aquilo que realmente importa</h2>
        <p>20, 21 e 22 de novembro de 2026, Faculdade Ufape, São Paulo/SP.</p>
        <a class="bt bt-claro" href="#investimento">Fazer minha inscrição</a>
    </div>
</section>

<?php
require __DIR__ . '/includes/popup-inscricao.php';
require __DIR__ . '/includes/popup-palestrante.php';
require __DIR__ . ($no_sistema ? '/includes/footer-sistema.php' : '/includes/footer.php');
