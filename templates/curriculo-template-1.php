<?php
/**
 * Template Moderno de Currículo
 * Variável $curriculo está disponível
 */

$pessoa = $curriculo->getPessoa();
$experiencias = $curriculo->getExperiencias();
$formacoes = $curriculo->getFormacoes();
$habilidades = $curriculo->getHabilidades();
$referencias = $curriculo->getReferencias();
?>

<!-- Cabeçalho do Currículo -->
<div class="curriculo-header">
    <h1><?php echo $pessoa->getNome(); ?></h1>
    <div class="info-pessoal">
        <?php if ($pessoa->getEmail()): ?>
            <p><i class="bi bi-envelope"></i> <?php echo $pessoa->getEmail(); ?></p>
        <?php endif; ?>
        
        <?php if ($pessoa->getTelefone()): ?>
            <p><i class="bi bi-telephone"></i> <?php echo $pessoa->getTelefone(); ?></p>
        <?php endif; ?>
        
        <?php if ($pessoa->getCidade() && $pessoa->getEstado()): ?>
            <p><i class="bi bi-geo-alt"></i> <?php echo $pessoa->getCidade() . ' - ' . $pessoa->getEstado(); ?></p>
        <?php endif; ?>
        
        <?php if ($pessoa->getIdade()): ?>
            <p><i class="bi bi-calendar"></i> <?php echo $pessoa->getIdade(); ?> anos</p>
        <?php endif; ?>
    </div>
</div>

<!-- Objetivo Profissional -->
<?php if ($pessoa->getObjetivoProfissional()): ?>
<div class="curriculo-section">
    <h2><i class="bi bi-bullseye"></i> Objetivo Profissional</h2>
    <p><?php echo nl2br($pessoa->getObjetivoProfissional()); ?></p>
</div>
<?php endif; ?>

<!-- Experiências Profissionais -->
<?php if (!empty($experiencias)): ?>
<div class="curriculo-section">
    <h2><i class="bi bi-briefcase"></i> Experiências Profissionais</h2>
    <?php foreach ($experiencias as $exp): ?>
        <div class="experiencia-item">
            <h3><?php echo $exp['cargo']; ?></h3>
            <p class="empresa"><?php echo $exp['empresa']; ?></p>
            <p class="periodo">
                <?php 
                $inicio = date('m/Y', strtotime($exp['data_inicio']));
                $fim = $exp['data_fim'] ? date('m/Y', strtotime($exp['data_fim'])) : 'Atual';
                echo "$inicio - $fim";
                ?>
            </p>
            <?php if (!empty($exp['descricao'])): ?>
                <p class="descricao"><?php echo nl2br($exp['descricao']); ?></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- Formação Acadêmica -->
<?php if (!empty($formacoes)): ?>
<div class="curriculo-section">
    <h2><i class="bi bi-mortarboard"></i> Formação Acadêmica</h2>
    <?php foreach ($formacoes as $form): ?>
        <div class="formacao-item">
            <h3><?php echo $form['curso']; ?></h3>
            <p class="instituicao"><?php echo $form['instituicao']; ?></p>
            <?php if (!empty($form['tipo'])): ?>
                <p class="tipo"><strong><?php echo $form['tipo']; ?></strong></p>
            <?php endif; ?>
            <p class="periodo">
                <?php 
                $inicio = date('m/Y', strtotime($form['data_inicio']));
                $fim = $form['data_fim'] ? date('m/Y', strtotime($form['data_fim'])) : 'Cursando';
                echo "$inicio - $fim";
                ?>
            </p>
            <?php if (!empty($form['descricao'])): ?>
                <p class="descricao"><?php echo nl2br($form['descricao']); ?></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- Habilidades e Competências -->
<?php if (!empty($habilidades)): ?>
<div class="curriculo-section">
    <h2><i class="bi bi-star"></i> Habilidades e Competências</h2>
    <div class="habilidades-list">
        <?php foreach ($habilidades as $hab): ?>
            <span class="habilidade-badge">
                <?php echo $hab['nome']; ?>
                <?php if (!empty($hab['nivel'])): ?>
                    - <?php echo $hab['nivel']; ?>
                <?php endif; ?>
            </span>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- Referências Profissionais -->
<?php if (!empty($referencias)): ?>
<div class="curriculo-section">
    <h2><i class="bi bi-people"></i> Referências Profissionais</h2>
    <?php foreach ($referencias as $ref): ?>
        <div class="referencia-item">
            <p><strong><?php echo $ref['nome']; ?></strong></p>
            <?php if (!empty($ref['cargo'])): ?>
                <p><?php echo $ref['cargo']; ?></p>
            <?php endif; ?>
            <?php if (!empty($ref['empresa'])): ?>
                <p><em><?php echo $ref['empresa']; ?></em></p>
            <?php endif; ?>
            <p>
                <?php if (!empty($ref['telefone'])): ?>
                    <i class="bi bi-telephone"></i> <?php echo $ref['telefone']; ?>
                <?php endif; ?>
                <?php if (!empty($ref['email'])): ?>
                    | <i class="bi bi-envelope"></i> <?php echo $ref['email']; ?>
                <?php endif; ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>