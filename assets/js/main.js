/**
 * JavaScript Principal - Gerador de Currículos
 * APO - Fundamentos de Programação para Internet
 */

// Aguardar carregamento completo do DOM
$(document).ready(function() {
    
    // ========== Cálculo Automático de Idade ==========
    $('#data_nascimento').on('change', function() {
        calcularIdade();
    });
    
    function calcularIdade() {
        const dataNascimentoInput = $('#data_nascimento').val();
        
        if (!dataNascimentoInput) {
            $('#idade').text('');
            return;
        }
        
        const dataNascimento = new Date(dataNascimentoInput);
        const hoje = new Date();
        
        let idade = hoje.getFullYear() - dataNascimento.getFullYear();
        const mes = hoje.getMonth() - dataNascimento.getMonth();
        
        // Ajustar idade se o aniversário ainda não ocorreu este ano
        if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
            idade--;
        }
        
        $('#idade').text(idade + ' anos');
        $('#idade_hidden').val(idade);
    }
    
    // ========== Campos Dinâmicos - Experiências ==========
    let experienciaCount = 0;
    
    $('#addExperiencia').click(function() {
        experienciaCount++;
        adicionarExperiencia(experienciaCount);
    });
    
    function adicionarExperiencia(id) {
        const novaExperiencia = `
            <div class="dynamic-field-item experiencia-item-field" data-id="${id}">
                <div class="dynamic-field-header">
                    <h5>Experiência #${id}</h5>
                    <button type="button" class="remove-field-btn remove-experiencia">
                        ✕ Remover
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Cargo *</label>
                            <input type="text" class="form-control" name="experiencias[${id}][cargo]" 
                                   placeholder="Ex: Desenvolvedor Web" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Empresa *</label>
                            <input type="text" class="form-control" name="experiencias[${id}][empresa]" 
                                   placeholder="Ex: Tech Solutions Ltda" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Data Início *</label>
                            <input type="date" class="form-control" name="experiencias[${id}][data_inicio]" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Data Fim</label>
                            <input type="date" class="form-control" name="experiencias[${id}][data_fim]">
                            <small class="text-muted">Deixe em branco se for o emprego atual</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Descrição das Atividades</label>
                            <textarea class="form-control" name="experiencias[${id}][descricao]" rows="3"
                                      placeholder="Descreva suas principais responsabilidades e conquistas..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        $('#experienciasContainer').append(novaExperiencia);
    }
    
    // Remover experiência
    $(document).on('click', '.remove-experiencia', function() {
        $(this).closest('.experiencia-item-field').fadeOut(300, function() {
            $(this).remove();
        });
    });
    
    // ========== Campos Dinâmicos - Formações ==========
    let formacaoCount = 0;
    
    $('#addFormacao').click(function() {
        formacaoCount++;
        adicionarFormacao(formacaoCount);
    });
    
    function adicionarFormacao(id) {
        const novaFormacao = `
            <div class="dynamic-field-item formacao-item-field" data-id="${id}">
                <div class="dynamic-field-header">
                    <h5>Formação #${id}</h5>
                    <button type="button" class="remove-field-btn remove-formacao">
                        ✕ Remover
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Curso *</label>
                            <input type="text" class="form-control" name="formacoes[${id}][curso]" 
                                   placeholder="Ex: Ciência da Computação" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Instituição *</label>
                            <input type="text" class="form-control" name="formacoes[${id}][instituicao]" 
                                   placeholder="Ex: UNIPAR" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select class="form-select" name="formacoes[${id}][tipo]">
                                <option value="Graduação">Graduação</option>
                                <option value="Pós-Graduação">Pós-Graduação</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                                <option value="Técnico">Técnico</option>
                                <option value="Curso">Curso</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Data Início *</label>
                            <input type="date" class="form-control" name="formacoes[${id}][data_inicio]" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Data Fim</label>
                            <input type="date" class="form-control" name="formacoes[${id}][data_fim]">
                            <small class="text-muted">Deixe em branco se estiver cursando</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea class="form-control" name="formacoes[${id}][descricao]" rows="2"
                                      placeholder="Informações adicionais sobre a formação..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        $('#formacoesContainer').append(novaFormacao);
    }
    
    // Remover formação
    $(document).on('click', '.remove-formacao', function() {
        $(this).closest('.formacao-item-field').fadeOut(300, function() {
            $(this).remove();
        });
    });
    
    // ========== Campos Dinâmicos - Habilidades ==========
    let habilidadeCount = 0;
    
    $('#addHabilidade').click(function() {
        habilidadeCount++;
        adicionarHabilidade(habilidadeCount);
    });
    
    function adicionarHabilidade(id) {
        const novaHabilidade = `
            <div class="dynamic-field-item habilidade-item-field" data-id="${id}">
                <div class="dynamic-field-header">
                    <h5>Habilidade #${id}</h5>
                    <button type="button" class="remove-field-btn remove-habilidade">
                        ✕ Remover
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Habilidade *</label>
                            <input type="text" class="form-control" name="habilidades[${id}][nome]" 
                                   placeholder="Ex: JavaScript, PHP, Trabalho em Equipe..." required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Nível</label>
                            <select class="form-select" name="habilidades[${id}][nivel]">
                                <option value="Básico">Básico</option>
                                <option value="Intermediário" selected>Intermediário</option>
                                <option value="Avançado">Avançado</option>
                                <option value="Especialista">Especialista</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        $('#habilidadesContainer').append(novaHabilidade);
    }
    
    // Remover habilidade
    $(document).on('click', '.remove-habilidade', function() {
        $(this).closest('.habilidade-item-field').fadeOut(300, function() {
            $(this).remove();
        });
    });
    
    // ========== Campos Dinâmicos - Referências ==========
    let referenciaCount = 0;
    
    $('#addReferencia').click(function() {
        referenciaCount++;
        adicionarReferencia(referenciaCount);
    });
    
    function adicionarReferencia(id) {
        const novaReferencia = `
            <div class="dynamic-field-item referencia-item-field" data-id="${id}">
                <div class="dynamic-field-header">
                    <h5>Referência #${id}</h5>
                    <button type="button" class="remove-field-btn remove-referencia">
                        ✕ Remover
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nome Completo *</label>
                            <input type="text" class="form-control" name="referencias[${id}][nome]" 
                                   placeholder="Nome da pessoa de referência" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Cargo</label>
                            <input type="text" class="form-control" name="referencias[${id}][cargo]" 
                                   placeholder="Ex: Gerente de TI">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Empresa</label>
                            <input type="text" class="form-control" name="referencias[${id}][empresa]" 
                                   placeholder="Nome da empresa">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Telefone *</label>
                            <input type="tel" class="form-control" name="referencias[${id}][telefone]" 
                                   placeholder="(00) 00000-0000" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="referencias[${id}][email]" 
                                   placeholder="email@exemplo.com">
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        $('#referenciasContainer').append(novaReferencia);
    }
    
    // Remover referência
    $(document).on('click', '.remove-referencia', function() {
        $(this).closest('.referencia-item-field').fadeOut(300, function() {
            $(this).remove();
        });
    });
    
    // ========== Validação do Formulário ==========
    $('#formCurriculo').on('submit', function(e) {
        // Verificar se há pelo menos uma experiência ou formação
        const temExperiencia = $('.experiencia-item-field').length > 0;
        const temFormacao = $('.formacao-item-field').length > 0;
        
        if (!temExperiencia && !temFormacao) {
            e.preventDefault();
            alert('Por favor, adicione pelo menos uma experiência profissional ou formação acadêmica.');
            return false;
        }
        
        // Validação HTML5
        if (!this.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        $(this).addClass('was-validated');
    });
    
    // ========== Máscaras de Input ==========
    
    // Máscara para telefone
    $('body').on('input', 'input[type="tel"]', function() {
        let valor = $(this).val().replace(/\D/g, '');
        
        if (valor.length <= 11) {
            valor = valor.replace(/^(\d{2})(\d)/g, '($1) $2');
            valor = valor.replace(/(\d)(\d{4})$/, '$1-$2');
        }
        
        $(this).val(valor);
    });
    
    // Máscara para CEP
    $('#cep').on('input', function() {
        let valor = $(this).val().replace(/\D/g, '');
        valor = valor.replace(/^(\d{5})(\d)/, '$1-$2');
        $(this).val(valor);
    });
    
    // ========== Mensagens de Feedback ==========
    
    // Auto-ocultar mensagens após 5 segundos
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
    
    // ========== Confirmações ==========
    
    // Confirmação antes de limpar formulário
    $('.btn-reset').click(function(e) {
        if (!confirm('Tem certeza que deseja limpar todos os dados do formulário?')) {
            e.preventDefault();
        }
    });
    
    // ========== Scroll Suave ==========
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        const target = $(this.getAttribute('href'));
        
        if (target.length) {
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });
    
    // ========== Inicialização ==========
    
    // Calcular idade se já houver data preenchida
    if ($('#data_nascimento').val()) {
        calcularIdade();
    }
    
    // Adicionar primeira experiência automaticamente (opcional)
    // adicionarExperiencia(1);
    // experienciaCount = 1;
    
    console.log('Sistema de Gerador de Currículos carregado com sucesso!');
});

// ========== Funções Globais ==========

// Função para formatar data (YYYY-MM-DD para DD/MM/YYYY)
function formatarData(data) {
    if (!data) return '';
    const partes = data.split('-');
    return `${partes[2]}/${partes[1]}/${partes[0]}`;
}

// Função para validar email
function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Função para validar telefone
function validarTelefone(telefone) {
    const numeros = telefone.replace(/\D/g, '');
    return numeros.length >= 10;
}