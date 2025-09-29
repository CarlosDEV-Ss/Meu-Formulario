<?php
require_once '../includes/config.php';

// Verificar se há currículo na sessão
if (!isset($_SESSION['curriculo'])) {
    set_message('Nenhum currículo encontrado. Preencha o formulário primeiro.', 'warning');
    redirect('../index.php');
}

$curriculo = unserialize($_SESSION['curriculo']);
$pessoa = $curriculo->getPessoa();
$pageTitle = 'Preview do Currículo';
include '../includes/header.php';
?>

<div class="main-container">
    <div class="preview-actions no-print text-center mb-4">
        <button onclick="imprimirCurriculoNovaJanela()" class="btn btn-primary btn-lg" id="btnDownload">
            <i class="bi bi-download"></i> Baixar/Imprimir Currículo
        </button>
        <a href="../index.php" class="btn btn-warning btn-lg">
            <i class="bi bi-pencil"></i> Editar Dados
        </a>
    </div>
    
    <div class="curriculo-preview" id="curriculo-preview">
        <?php echo $curriculo->gerarHTML(); ?>
    </div>
    
    <div class="preview-actions no-print text-center mt-4 mb-5">
        <button onclick="imprimirCurriculoNovaJanela()" class="btn btn-success btn-lg">
            <i class="bi bi-printer"></i> Imprimir
        </button>
        <a href="../index.php" class="btn btn-secondary btn-lg">
            <i class="bi bi-house"></i> Voltar ao Início
        </a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
