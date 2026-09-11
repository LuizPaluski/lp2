<?php
// Textos da página, conforme a copy aprovada do NeuroVet Summit.
// Os trechos entre colchetes vieram do documento base e seguem pendentes de
// confirmação da coordenação; não invente nomes nem horários no lugar deles.

$selos = [
    'Evento presencial',
    'Bootcamp dia 22/11 exclusivo para os 30 primeiros inscritos',
    'Certificado UFAPE',
];

$numeros = [
    'Data'           => '20, 21 e 22 de novembro de 2026',
    'Local'          => 'Faculdade Ufape, R. Honduras, 765, Jardim Paulista, São Paulo/SP',
    'Carga horária'  => '24 horas estimadas, entre programação científica, Bootcamp e debriefings',
    'Vagas Bootcamp' => 'Somente 30 vagas para o dia 22 de novembro',
];

$diferenciais = [
    'Primeiro evento UFAPE estruturado especificamente em torno de neuromonitorização e tomada de decisão anestésica.',
    'Integração de EEG bruto, BIS, qCON, qNOX, PTA, NIRS, entropia, pupilometria e índices derivados de inteligência artificial.',
    'Discussão de limitações, artefatos e interpretação em diferentes espécies.',
    'Trilha específica para interface Anestesiologia e UTI, incluindo sedação, neuroproteção e paciente crítico.',
    'Bootcamp de um dia inteiro com estações rotativas, interpretação em tempo real e casos simulados.',
    'Escape Room da Anestesia com debriefing baseado em evidências.',
    'Abordagem centrada em decisões clínicas, não apenas em equipamentos.',
];

// Cada linha: horário, atividade, professor sugerido, conteúdo e foco.
$programacao = [
    [
        'data'   => '20 de novembro de 2026, sexta-feira',
        'tema'   => 'O cérebro sob anestesia',
        'linhas' => [
            ['08h30 às 09h00', 'Abertura. Por que ainda anestesiamos no escuro?', 'Prof. MSc. Yuri Vicentini e Prof. MSc. Daniel Zannin', 'Evolução da monitorização, EEG e conceito de Precision Anesthesia.'],
            ['09h00 às 10h00', 'Neurofisiologia aplicada à anestesia', 'Prof. Dr. Rodrigo Neca', 'Redes neurais, consciência, formação reticular, tálamo, sono, hipnose, dor e nocicepção.'],
            ['10h00 às 10h30', 'Intervalo', '', ''],
            ['10h30 às 11h30', 'EEG para anestesistas veterinários: do traçado à decisão', 'Convidado em EEG clínico [a definir]', 'Ondas, EMG, eletrocautério, hipotermia, burst suppression e isoeletricidade.'],
            ['11h30 às 12h15', 'Artefato ou cérebro? O que realmente estamos medindo?', 'Prof. MSc. Yuri Vicentini', 'Discussão interativa de traçados e armadilhas de interpretação.'],
            ['12h15 às 13h30', 'Intervalo para almoço', '', ''],
            ['13h30 às 14h30', 'BIS: história, algoritmo, interpretação e limitações', 'Prof. MSc. TEAV. Felipe Zanuzzo [a confirmar]', 'Quando confiar, quando não confiar e como evitar interpretação isolada do índice.'],
            ['14h30 às 15h30', 'BIS nas diferentes espécies: cães, gatos, equinos, suínos e ruminantes', 'Prof. Dr. Rodrigo Neca [a confirmar]', 'Discussão crítica da literatura veterinária e aplicabilidade clínica.'],
            ['15h30 às 16h00', 'Intervalo', '', ''],
            ['16h00 às 17h00', 'Consciência intraoperatória e profundidade anestésica', 'Convidado [a definir]', 'Hipnose, resposta motora, memória e limites dos índices processados.'],
            ['17h00 às 18h00', 'Mesa redonda: BIS realmente mede profundidade anestésica?', 'Prof. MV. MSc. TEAV Daniel Zannin, Prof. MSc. Yuri Vicentini e Profa. Dra. Daniela Campagnol [a confirmar]', 'Debate orientado por casos clínicos.'],
            ['18h00 às 18h30', 'Fechamento do dia e briefing para o sábado', 'Coordenação NeuroVet', 'Síntese dos conceitos e perguntas chave.'],
        ],
    ],
    [
        'data'   => '21 de novembro de 2026, sábado',
        'tema'   => 'Muito além do BIS',
        'linhas' => [
            ['08h30 às 09h15', 'qCON: hipnose e estados de consciência', 'Prof. Dr. Yuri Vicentini', 'Diferenças conceituais e clínicas em relação ao BIS.'],
            ['09h15 às 10h00', 'qNOX: nocicepção e predição de resposta', 'Prof. Dr. Yuri Vicentini', 'Movimento, resposta autonômica, limitações e interpretação contextual.'],
            ['10h00 às 10h45', 'PTA: variabilidade da frequência cardíaca e analgesia guiada', 'Convidado em nocicepção e HRV [a definir]', 'Quando aumentar opioide? Quando reduzir? Como integrar com PA e FC.'],
            ['10h45 às 11h15', 'Intervalo', '', ''],
            ['11h15 às 12h00', 'NIRS e oxigenação cerebral', 'Convidado em neuroanestesia e monitorização [a definir]', 'Perfusão, choque, sepse, neurocirurgia e paciente crítico.'],
            ['12h00 às 12h45', 'Entropia, EEG bruto, CSA e DSA', 'Prof. MV. MSc. TEAV. Daniel Zannin', 'Response Entropy, State Entropy, espectrograma e leitura complementar.'],
            ['12h45 às 13h30', 'Pupilometria e Pupillary Pain Index', 'Convidado em dor e nocicepção [a definir]', 'Reflexo pupilar, estímulo nociceptivo e aplicações perioperatórias.'],
            ['13h30 às 14h30', 'Intervalo para almoço', '', ''],
            ['14h30 às 15h15', 'Índices derivados de IA: o futuro da anestesia de precisão', 'Prof. Dr. Alessandro Martins e convidado em IA e monitorização', 'Machine learning, predição de despertar, hipotensão e analgesia personalizada.'],
            ['15h15 às 16h00', 'UTI neuromonitorizada: sedação, EEG simplificado e analgesia', 'Prof. Daniel Zannin, Prof. Renan Holczer e Profa. Dra. Mayara Travalini de Lima', 'Paciente séptico, TCE, estado epiléptico, pós PCR e sedação prolongada.'],
            ['16h00 às 16h30', 'Intervalo', '', ''],
            ['16h30 às 17h30', 'Neuromonitorização multimodal: o paciente não é apenas um BIS', 'Prof. Dr. Rodrigo Neca', 'Integração de BIS, qNOX, PTA, PAM, ETCO2, MAC, NIRS, temperatura, lactato e gasometria.'],
            ['17h30 às 18h30', 'Grande mesa de casos: o monitor mudou a sua conduta?', 'Mayara, Rodrigo, Daniel, Yuri e convidados', 'Casos curtos, votação e justificativa da decisão anestésica.'],
        ],
    ],
];

$bootcamp = [
    'data'      => '22 de novembro de 2026, domingo',
    'tema'      => 'Monitorando um paciente do início ao fim',
    'descricao' => 'Dia inteiro de prática em estações rotativas, exclusivamente presencial. A turma será dividida em pequenos grupos conforme a quantidade de equipamentos e instrutores. Cada estação combina execução, interpretação e decisão clínica.',
    'linhas'    => [
        ['08h30 às 09h00', 'Briefing geral do Bootcamp', 'Coordenação e instrutores', 'Segurança, divisão dos grupos, objetivos e critérios de debriefing.'],
        ['09h00 às 09h40', 'Estação 1. Instalação correta', 'Instrutores NeuroVet', 'BIS, qCON, qNOX e PTA: colocação, preparo de pele e prevenção de artefatos.'],
        ['09h45 às 10h25', 'Estação 2. Simulador de EEG', 'Convidado em EEG e monitores', 'Superficial? Profundo? Artefato? Burst suppression? Previsão de despertar.'],
        ['10h30 às 11h10', 'Estação 3. Casos clínicos simulados', 'Daniel e instrutores', 'Piometra com BIS 18 e PAM 42; gato com cetamina e BIS elevado; decisão contextual.'],
        ['11h15 às 11h55', 'Estação 4. Nocicepção em tempo real', 'Mayara e convidados', 'Vídeos cirúrgicos com qNOX, PTA, FC, PA e EMG; decisão sobre opioide, bloqueio e adjuvantes.'],
        ['12h00 às 13h00', 'Intervalo para almoço', '', ''],
        ['13h00 às 13h40', 'Estação 5. Ultrassom e neuromonitorização', 'Instrutor de locorregional e Mayara', 'Bloqueios locorregionais e avaliação do efeito sobre PTA e qNOX.'],
        ['13h45 às 14h25', 'Estação 6. UTI neuromonitorizada', 'Renan e equipe de UTI [a confirmar]', 'Choque séptico, TCE, estado epiléptico, hipóxia, hipotermia, intoxicações e pós PCR.'],
        ['14h30 às 15h10', 'Estação 7. Recuperação anestésica', 'Equipe NeuroVet', 'Despertar, delirium, vocalização, disforia e recuperação neurológica.'],
        ['15h15 às 16h15', 'Escape Room da Anestesia', 'Mayara, Alessandro, Daniel e convidados', 'Equipes recebem um caso e novos eventos em tempo real: hipotensão, hipercapnia, burst suppression, qNOX alto, PTA baixo, arritmia, hipotermia e sangramento.'],
        ['16h15 às 17h00', 'Debriefing integrado baseado em evidências', 'Painel de especialistas', 'Análise das decisões, prioridades, comunicação e uso dos monitores.'],
        ['17h00 às 17h30', 'Encerramento e mensagem final', 'Coordenação NeuroVet', 'Síntese prática: medir menos por medir e interpretar mais para decidir melhor.'],
    ],
];

$inclusos = [
    'Certificado UFAPE conforme modalidade e presença',
    'Apostila e material digital, se previsto',
    'Acesso às gravações das palestras teóricas, caso a modalidade seja confirmada',
    'Participação nas estações do Bootcamp para os 30 primeiros inscritos',
];

// A foto entra quando a coordenação enviar; sem ela o card mostra só nome e atuação.
// A chave é o trecho pelo qual a agenda reconhece o palestrante, que aparece lá com
// títulos diferentes a cada linha.
$palestrantes = [
    ['nome' => 'Profa. Dra. Mayara Travalini de Lima', 'tema' => 'Coordenação científica. Neuromonitorização, nocicepção, integração multimodal e casos', 'foto' => 'mayara.jpg', 'chave' => 'Mayara'],
    ['nome' => 'Prof. Dr. Alessandro Martins', 'tema' => 'Coordenação, tecnologia e integração, Bootcamp avançado', 'foto' => 'alessandro.jpg', 'chave' => 'Alessandro'],
    ['nome' => 'Prof. Daniel Zannin', 'tema' => 'Apoio à trilha de ventilação e UTI, conforme expertise e confirmação', 'foto' => 'zannin.jpg', 'chave' => 'Daniel'],
    ['nome' => 'Prof. Renan Holczer', 'tema' => 'Ventilação mecânica e UTI neuromonitorizada', 'foto' => 'renan.jpg', 'chave' => 'Renan'],
    ['nome' => 'Prof. MSc. Yuri Vicentini', 'tema' => 'Participação a definir conforme tema e disponibilidade', 'foto' => '', 'chave' => ''],
    ['nome' => 'Convidado em neurofisiologia e EEG clínico', 'tema' => 'A definir', 'foto' => '', 'chave' => ''],
    ['nome' => 'Convidado em neuroanestesia e NIRS', 'tema' => 'A definir', 'foto' => '', 'chave' => ''],
    ['nome' => 'Convidado em nocicepção e variabilidade da frequência cardíaca', 'tema' => 'A definir', 'foto' => '', 'chave' => ''],
    ['nome' => 'Convidado em inteligência artificial e processamento de sinais', 'tema' => 'A definir', 'foto' => '', 'chave' => ''],
];

$fotos_palestrantes = array_filter(array_column($palestrantes, 'foto', 'chave'));

// Uma linha da agenda pode citar mais de um palestrante.
function retratos_da_linha(string $quem): array
{
    global $fotos_palestrantes;

    $retratos = [];
    foreach ($fotos_palestrantes as $chave => $foto) {
        $onde = strpos($quem, $chave);
        if ($onde !== false) {
            $retratos[$onde] = $foto;
        }
    }
    ksort($retratos);

    return array_values($retratos);
}

$faq = [
    ['O evento será presencial ou online?', 'A proposta principal é presencial. A gravação e transmissão das palestras teóricas ainda será confirmada. O Bootcamp é presencial.'],
    ['É necessário saber interpretar EEG previamente?', 'Não. A sexta-feira foi desenhada justamente para construir a base clínica de neurofisiologia, EEG e índices processados.'],
    ['O evento será apenas sobre BIS?', 'Não. O NeuroVet integra BIS, qCON, qNOX, PTA, NIRS, entropia, pupilometria, EEG bruto, CSA e DSA e outros dados fisiológicos.'],
    ['Haverá prática?', 'Sim. O domingo é dedicado ao Bootcamp, com estações rotativas, simulação, casos e Escape Room.'],
    ['O Bootcamp está incluído no ingresso do simpósio?', 'A condição comercial ainda será definida: ingresso integrado para os três dias ou Bootcamp vendido separadamente.'],
    ['Haverá certificado?', 'Sim, conforme presença e modalidade de inscrição definida pela UFAPE.'],
];
