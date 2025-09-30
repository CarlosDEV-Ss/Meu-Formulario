<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de currículos</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
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

    <!-- Main Content -->
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
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="nome">✏️ Nome Completo *</label>
                                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                            </div>
                            <div class="form-group">
                                <label for="email">✉️ Email *</label>
                                <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                            </div>
                            <div class="form-group">
                                <label for="telefone">📞 Telefone</label>
                                <input type="tel" id="telefone" name="telefone" placeholder="(11) 99999-9999">
                            </div>
                            <div class="form-group">
                                <label for="endereco">📍 Endereço</label>
                                <input type="text" id="endereco" name="endereco" placeholder="Cidade, Estado">
                            </div>
                            <div class="form-group full-width">
                                <label for="nascimento">Data de Nascimento*</label>
                                <input type="date" id="nascimento" name="nascimento">
                            </div>
                            <div class="form-group full-width">
                                <label for="idade">Idade</label>
                                <input type="text" id="idade" name="idade" placeholder="25" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Formação Acadêmica -->
                    <div class="section">
                        <div class="section-header">
                            <span class="icon">🎓</span>
                            <h2>Formação Acadêmica</h2>
                        </div>
                        <div class="form-group full-width">
                            <textarea name="formacao" placeholder="Descreva suas formações acadêmicas (cursos, certificações, etc.)" rows="4"></textarea>
                        </div>
                    </div>

                    <!-- Experiência Profissional -->
                    <div class="section">
                        <div class="section-header">
                            <span class="icon">💼</span>
                            <h2>Experiência Profissional *</h2>
                        </div>
                        <p class="section-subtitle">Adicione suas experiências profissionais clicando no botão abaixo</p>
                        <button type="button" class="add-btn">➕ Adicionar Experiência Profissional</button>
                    </div>

                    <!-- Habilidades Técnicas -->
                    <div class="section">
                        <div class="section-header">
                            <span class="icon">💻</span>
                            <h2>Habilidades Técnicas</h2>
                        </div>
                        <div class="form-group full-width">
                            <textarea name="habilidades" placeholder="Liste suas principais habilidades e competências técnicas" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Objetivos de Aprendizado -->
                    <div class="section">
                        <div class="section-header">
                            <span class="icon">🎯</span>
                            <h2>Objetivos de Aprendizado</h2>
                        </div>
                        <div class="form-group full-width">
                            <textarea name="objetivos" placeholder="Descreva seus objetivos e o que você gostaria de aprender" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Botão Submit -->
                    <div class="submit-section">
                        <button type="submit" class="submit-btn">⬇️ Baixar Perfil Completo</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js?v=<?= time() ?>"></script>
</body>
</html>
