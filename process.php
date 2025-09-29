<?php
/**
 * Processamento dos Dados do Formulário
 * Recebe os dados, cria o objeto Curriculo e redireciona para preview
 */

require_once 'includes/config.php';

// Verificar se é POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    set_message('Acesso inválido!', 'danger');
    redirect('index.php');
}

try {
    // Criar novo currículo
    $curriculo = new Curriculo();
    
    // Processar dados pessoais
    $dadosPessoais = [
        'nome' => $_POST['nome'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telefone' => $_POST['telefone'] ?? '',
        'data_nascimento' => $_POST['data_nascimento'] ?? '',
        'endereco' => $_POST['endereco'] ?? '',
        'cidade' => $_POST['cidade'] ?? '',
        'estado' => $_POST['estado'] ?? '',
        'cep' => $_POST['cep'] ?? '',
        'objetivo' => $_POST['objetivo'] ?? '',
        'linkedin' => $_POST['linkedin'] ?? '',
        'github' => $_POST['github'] ?? ''
    ];
    
    $curriculo->setPessoa($dadosPessoais);
    
    // Processar experiências
    if (isset($_POST['experiencias']) && is_array($_POST['experiencias'])) {
        foreach ($_POST['experiencias'] as $exp) {
            if (!empty($exp['cargo']) && !empty($exp['empresa'])) {
                $curriculo->adicionarExperiencia($exp);
            }
        }
    }
    
    // Processar formações
    if (isset($_POST['formacoes']) && is_array($_POST['formacoes'])) {
        foreach ($_POST['formacoes'] as $form) {
            if (!empty($form['curso']) && !empty($form['instituicao'])) {
                $curriculo->adicionarFormacao($form);
            }
        }
    }
    
    // Processar habilidades
    if (isset($_POST['habilidades']) && is_array($_POST['habilidades'])) {
        foreach ($_POST['habilidades'] as $hab) {
            if (!empty($hab['nome'])) {
                $curriculo->adicionarHabilidade($hab);
            }
        }
    }
    
    // Processar referências
    if (isset($_POST['referencias']) && is_array($_POST['referencias'])) {
        foreach ($_POST['referencias'] as $ref) {
            if (!empty($ref['nome']) && !empty($ref['telefone'])) {
                $curriculo->adicionarReferencia($ref);
            }
        }
    }
    
    // Validar currículo
    $validacao = $curriculo->validar();
    
    if ($validacao !== true) {
        $erros = implode('<br>', $validacao);
        set_message('Erros encontrados:<br>' . $erros, 'danger');
        redirect('index.php');
    }
    
    // Salvar na sessão
    $_SESSION['curriculo'] = serialize($curriculo);
    
    // Redirecionar para preview
    redirect('pages/preview.php');
    
} catch (Exception $e) {
    set_message('Erro ao processar currículo: ' . $e->getMessage(), 'danger');
    redirect('index.php');
}
?>