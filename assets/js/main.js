// Verificar se jQuery carregou
if (typeof jQuery === 'undefined') {
    console.error('jQuery não carregou!');
} else {
    console.log('jQuery carregado com sucesso!');
}

$(document).ready(function() {
    console.log('DOM carregado! JavaScript funcionando...');
    
    // Cálculo automático de idade
    $('#nascimento').on('change', function() {
        const nascimento = new Date(this.value);
        const hoje = new Date();
        let idade = hoje.getFullYear() - nascimento.getFullYear();
        const mes = hoje.getMonth() - nascimento.getMonth();
        
        if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
            idade--;
        }
        
        $('#idade').val(idade);
    });
    
    // Contador para experiências adicionais
    let contadorExperiencias = 1;
    
    // Botão adicionar experiência
    $('.add-btn').on('click', function() {
        contadorExperiencias++;
        
        // Criar nova área de experiência
        const novaExperiencia = `
            <div class="experiencia-extra border border-primary border-2 border-dashed rounded p-3 mt-3" style="background: rgba(102, 126, 234, 0.05);">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-primary mb-0">📝 Experiência ${contadorExperiencias}</h4>
                    <button type="button" class="btn btn-danger btn-sm remover-experiencia">✖ Remover</button>
                </div>
                <div class="mb-3">
                    <label class="form-label">💼 Cargo/Função</label>
                    <input type="text" class="form-control" name="experiencia_cargo_${contadorExperiencias}" placeholder="Ex: Desenvolvedor Jr, Analista, Estagiário...">
                </div>
                <div class="mb-3">
                    <label class="form-label">🏢 Empresa</label>
                    <input type="text" class="form-control" name="experiencia_empresa_${contadorExperiencias}" placeholder="Ex: TechCorp, StartupXYZ, Freelancer...">
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">📅 Período (Início)</label>
                        <input type="month" class="form-control" name="experiencia_inicio_${contadorExperiencias}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">📅 Período (Fim)</label>
                        <input type="month" class="form-control" name="experiencia_fim_${contadorExperiencias}" placeholder="Deixe vazio se atual">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">📋 Principais atividades (opcional)</label>
                    <textarea class="form-control" name="experiencia_atividades_${contadorExperiencias}" rows="3" placeholder="Descreva brevemente suas principais responsabilidades..."></textarea>
                </div>
            </div>
        `;
        
        // Adicionar antes do botão
        $(this).before(novaExperiencia);
        
        // Animar a entrada
        $(this).prev('.experiencia-extra').hide().fadeIn(400);
        
        // Rolar suavemente para a nova experiência
        $('html, body').animate({
            scrollTop: $(this).prev('.experiencia-extra').offset().top - 50
        }, 500);
    });
    
    // Remover experiência extra
    $(document).on('click', '.remover-experiencia', function() {
        if (confirm('Tem certeza que deseja remover esta experiência?')) {
            $(this).closest('.experiencia-extra').fadeOut(300, function() {
                $(this).remove();
            });
        }
    });
    
    // Validação simples do formulário
    $('form').on('submit', function(e) {
        const nome = $('#nome').val();
        const email = $('#email').val();
        const temExperiencias = $('.experiencia-extra').length > 0;
        
        if (!nome || !email) {
            alert('Preencha nome e email!');
            e.preventDefault();
            return false;
        }
        
        if (!temExperiencias) {
            alert('Adicione pelo menos uma experiência profissional!');
            e.preventDefault();
            return false;
        }
    });
    
});
