<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

function limparDados($dados) {
    return htmlspecialchars(trim($dados));
}

$dados = [
    'nome' => limparDados($_POST['nome'] ?? ''),
    'email' => limparDados($_POST['email'] ?? ''),
    'telefone' => limparDados($_POST['telefone'] ?? ''),
    'endereco' => limparDados($_POST['endereco'] ?? ''),
    'nascimento' => $_POST['nascimento'] ?? '',
    'idade' => $_POST['idade'] ?? '',
    'formacao' => limparDados($_POST['formacao'] ?? ''),
    'habilidades' => limparDados($_POST['habilidades'] ?? ''),
    'objetivos' => limparDados($_POST['objetivos'] ?? '')
];

// Capturar experiências extras
$experienciasExtras = [];
foreach ($_POST as $key => $value) {
    if (strpos($key, 'experiencia_cargo_') === 0) {
        $numero = str_replace('experiencia_cargo_', '', $key);
        $experienciasExtras[$numero]['cargo'] = limparDados($value);
    }
    if (strpos($key, 'experiencia_empresa_') === 0) {
        $numero = str_replace('experiencia_empresa_', '', $key);
        $experienciasExtras[$numero]['empresa'] = limparDados($value);
    }
    if (strpos($key, 'experiencia_inicio_') === 0) {
        $numero = str_replace('experiencia_inicio_', '', $key);
        $experienciasExtras[$numero]['inicio'] = $value;
    }
    if (strpos($key, 'experiencia_fim_') === 0) {
        $numero = str_replace('experiencia_fim_', '', $key);
        $experienciasExtras[$numero]['fim'] = $value;
    }
    if (strpos($key, 'experiencia_atividades_') === 0) {
        $numero = str_replace('experiencia_atividades_', '', $key);
        $experienciasExtras[$numero]['atividades'] = limparDados($value);
    }
}

// Verificar se tem pelo menos uma experiência adicionada
$temExperiencia = false;
foreach ($experienciasExtras as $exp) {
    if (!empty($exp['cargo']) || !empty($exp['empresa'])) {
        $temExperiencia = true;
        break;
    }
}

if (empty($dados['nome']) || empty($dados['email']) || !$temExperiencia) {
    echo '<script>alert("Preencha nome, email e adicione pelo menos uma experiência profissional!"); window.history.back();</script>';
    exit();
}

function formatarData($data) {
    if (empty($data)) return '';
    return date('d/m/Y', strtotime($data));
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo - <?= $dados['nome'] ?></title>
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        body { background: white; }
        .curriculo {
            max-width: 800px;
            margin: 20px auto;
            padding: 40px;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #667eea;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .nome {
            font-size: 28px;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 10px;
        }
        .contato {
            color: #666;
            font-size: 14px;
        }
        .secao {
            margin-bottom: 25px;
        }
        .secao h3 {
            color: #667eea;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .acoes {
            text-align: center;
            margin: 20px 0;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        .btn {
            background: #667eea;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin: 0 10px;
            cursor: pointer;
        }
        .btn:hover {
            background: #5a67d8;
        }
        .btn-secondary {
            background: #6c757d;
        }
        @media print {
            .acoes { display: none; }
            .curriculo { border: none; margin: 0; padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="acoes">
        <button onclick="window.print()" class="btn">Imprimir Currículo</button>
        <a href="index.php" class="btn btn-secondary">Voltar ao Formulário</a>
    </div>

    <div class="curriculo">
        <div class="header">
            <h1 class="nome"><?= $dados['nome'] ?></h1>
            <div class="contato">
                <?= $dados['email'] ?> | <?= $dados['telefone'] ?>
                <?php if (!empty($dados['endereco'])): ?>
                    | <?= $dados['endereco'] ?>
                <?php endif; ?>
                <?php if (!empty($dados['nascimento'])): ?>
                    | Nascimento: <?= formatarData($dados['nascimento']) ?>
                <?php endif; ?>
                <?php if (!empty($dados['idade'])): ?>
                    | Idade: <?= $dados['idade'] ?> anos
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($experienciasExtras)): ?>
        <div class="secao">
            <h3>Experiências Profissionais</h3>
            <?php foreach ($experienciasExtras as $exp): ?>
                <?php if (!empty($exp['cargo']) || !empty($exp['empresa'])): ?>
                <div style="margin-bottom: 20px; padding: 15px; border-left: 3px solid #667eea; background: #f8f9fa;">
                    <?php if (!empty($exp['cargo'])): ?>
                        <h4 style="margin: 0 0 5px 0; color: #2d3748;"><?= $exp['cargo'] ?></h4>
                    <?php endif; ?>
                    <?php if (!empty($exp['empresa'])): ?>
                        <p style="margin: 0 0 5px 0; color: #667eea; font-weight: 500;"><?= $exp['empresa'] ?></p>
                    <?php endif; ?>
                    <?php if (!empty($exp['inicio']) || !empty($exp['fim'])): ?>
                        <p style="margin: 0 0 10px 0; color: #28a745; font-size: 14px;">
                            <?= !empty($exp['inicio']) ? date('m/Y', strtotime($exp['inicio'].'-01')) : '' ?>
                            <?= (!empty($exp['inicio']) && !empty($exp['fim'])) ? ' - ' : '' ?>
                            <?= !empty($exp['fim']) ? date('m/Y', strtotime($exp['fim'].'-01')) : (!empty($exp['inicio']) ? ' - Atual' : '') ?>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($exp['atividades'])): ?>
                        <p style="margin: 0; color: #495057;"><?= nl2br($exp['atividades']) ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($dados['formacao'])): ?>
        <div class="secao">
            <h3>Formação Acadêmica</h3>
            <p><?= nl2br($dados['formacao']) ?></p>
        </div>
        <?php endif; ?>

        <?php if (!empty($dados['habilidades'])): ?>
        <div class="secao">
            <h3>Habilidades Técnicas</h3>
            <p><?= nl2br($dados['habilidades']) ?></p>
        </div>
        <?php endif; ?>

        <?php if (!empty($dados['objetivos'])): ?>
        <div class="secao">
            <h3>Objetivos de Aprendizado</h3>
            <p><?= nl2br($dados['objetivos']) ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
