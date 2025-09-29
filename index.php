<?php
require_once 'includes/config.php';
$pageTitle = 'Início - Gerador de Currículos';
include 'includes/header.php';
?>

<div class="main-container">
    <!-- Hero Section -->
    <div class="card text-center mb-5">
        <div class="card-body p-5">
            <h1 class="display-4 mb-3">
                <i class="bi bi-file-earmark-person text-primary"></i><br>
                Gerador de Currículos Online
            </h1>
            <p class="lead mb-4">Crie seu currículo profissional de forma rápida, fácil e gratuita!</p>
            <a href="#criar" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle"></i> Criar Meu Currículo
            </a>
        </div>
    </div>
    
    <div id="criar"></div>
    <h2 class="text-center mb-4">Preencha seus Dados</h2>
    
    <form id="formCurriculo" method="POST" action="process.php" novalidate>
        
        <!-- Dados Pessoais -->
        <div class="card mb-4">
            <div class="card-header">
                <h3><i class="bi bi-person-fill"></i> Dados Pessoais</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">Nome Completo *</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="telefone" class="form-label">Telefone *</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento *</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                        <small class="text-muted">Idade: <strong><span id="idade"></span></strong></small>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" maxlength="9">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" maxlength="2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="objetivo" class="form-label">Objetivo Profissional</label>
                        <textarea class="form-control" id="objetivo" name="objetivo" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Experiências -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><i class="bi bi-briefcase-fill"></i> Experiências Profissionais</h3>
                <button type="button" class="add-field-btn" id="addExperiencia">
                    <i class="bi bi-plus-circle"></i> Adicionar
                </button>
            </div>
            <div class="card-body">
                <div id="experienciasContainer"></div>
                <small class="text-muted">Clique em "Adicionar" para incluir suas experiências</small>
            </div>
        </div>
        
        <!-- Formações -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><i class="bi bi-mortarboard-fill"></i> Formação Acadêmica</h3>
                <button type="button" class="add-field-btn" id="addFormacao">
                    <i class="bi bi-plus-circle"></i> Adicionar
                </button>
            </div>
            <div class="card-body">
                <div id="formacoesContainer"></div>
                <small class="text-muted">Clique em "Adicionar" para incluir sua formação</small>
            </div>
        </div>
        
        <!-- Habilidades -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><i class="bi bi-star-fill"></i> Habilidades e Competências</h3>
                <button type="button" class="add-field-btn" id="addHabilidade">
                    <i class="bi bi-plus-circle"></i> Adicionar
                </button>
            </div>
            <div class="card-body">
                <div id="habilidadesContainer"></div>
                <small class="text-muted">Clique em "Adicionar" para incluir habilidades</small>
            </div>
        </div>
        
        <!-- Referências -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><i class="bi bi-people-fill"></i> Referências Profissionais</h3>
                <button type="button" class="add-field-btn" id="addReferencia">
                    <i class="bi bi-plus-circle"></i> Adicionar
                </button>
            </div>
            <div class="card-body">
                <div id="referenciasContainer"></div>
                <small class="text-muted">Clique em "Adicionar" para incluir referências (opcional)</small>
            </div>
        </div>
        
        <!-- Botões de Ação -->
        <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary btn-lg me-2">
                <i class="bi bi-check-circle"></i> Gerar Currículo
            </button>
            <button type="reset" class="btn btn-warning btn-lg btn-reset">
                <i class="bi bi-arrow-counterclockwise"></i> Limpar Formulário
            </button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
