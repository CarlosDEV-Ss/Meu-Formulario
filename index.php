<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">Gerador de currículos</h1>
            <nav class="nav">
                <a href="#">Início</a>
                <a href="#">Criar Currículo</a>
                <a href="#">Ajuda</a>
            </nav>
        </div>
    </header>
    <main class="main-content">
        <div class="container">
            <div class="form-card">
                <form method="POST" action="processar.php">
                    <!-- Informações Pessoais -->
                    <div class="section">
                        <div class="section-header">
                            <span class="icon">👤</span>
                            <h2>Informações Pessoais</h2>
                        </div>
                        <p class="section-subtitle">Preencha os dados para criar um perfil completo</p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">✟️ Nome Completo *</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">✉️ Email *</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telefone" class="form-label">📞 Telefone</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(11) 99999-9999">
                            </div>
                            <div class="col-md-6">
                                <label for="endereco" class="form-label">📍 Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Cidade, Estado">
                            </div>
                            <div class="col-md-6">
                                <label for="nascimento" class="form-label">Data de Nascimento*</label>
                                <input type="date" class="form-control" id="nascimento" name="nascimento">
                            </div>
                            <div class="col-md-6">
                                <label for="idade" class="form-label">Idade</label>
                                <input type="text" class="form-control" id="idade" name="idade" placeholder="25" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Formação Acadêmica -->
                    <div class="section">
                        <div class="section-header">
                            <span class="icon">🎓</span>
                            <h2>Formação Acadêmica</h2>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="formacao" placeholder="Descreva suas formações acadêmicas (cursos, certificações, etc.)" rows="4"></textarea>
                        </div>
                    </div>

                    <!-- Experiência Profissional -->
                    <div class="section">
                        <div class="section-header">
                            <span class="icon">💼</span>
                            <h2>Experiência Profissional *</h2>
                        </div>
                        <p class="section-subtitle">Adicione suas experiências profissionais clicando no botão abaixo</p>
                        <button type="button" class="btn btn-outline-primary w-100 add-btn">➡️ Adicionar Experiência Profissional</button>
                    </div>

                    <!-- Habilidades Técnicas -->
                    <div class="section">
                        <div class="section-header">
                            <span class="icon">💻</span>
                            <h2>Habilidades Técnicas</h2>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="habilidades" placeholder="Liste suas principais habilidades e competências técnicas" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Objetivos de Aprendizado -->
                    <div class="section">
                        <div class="section-header">
                            <span class="icon">🎯</span>
                            <h2>Objetivos de Aprendizado</h2>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="objetivos" placeholder="Descreva seus objetivos e o que você gostaria de aprender" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Botão Submit -->
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary btn-lg submit-btn">⬇️ Baixar Perfil Completo</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js?v=<?= time() ?>"></script>
</body>
</html>
