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
            <div class="experiencia-extra" style="margin-top: 20px; padding: 15px; border: 2px dashed #667eea; border-radius: 8px; background: rgba(102, 126, 234, 0.05);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h4 style="margin: 0; color: #667eea;">📝 Experiência ${contadorExperiencias}</h4>
                    <button type="button" class="remover-experiencia" style="background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">✖ Remover</button>
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="font-size: 14px; font-weight: 500; color: #4a5568; margin-bottom: 8px; display: block;">💼 Cargo/Função</label>
                    <input type="text" name="experiencia_cargo_${contadorExperiencias}" placeholder="Ex: Desenvolvedor Jr, Analista, Estagiário..." style="width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="font-size: 14px; font-weight: 500; color: #4a5568; margin-bottom: 8px; display: block;">🏢 Empresa</label>
                    <input type="text" name="experiencia_empresa_${contadorExperiencias}" placeholder="Ex: TechCorp, StartupXYZ, Freelancer..." style="width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div class="form-group">
                        <label style="font-size: 14px; font-weight: 500; color: #4a5568; margin-bottom: 8px; display: block;">📅 Período (Início)</label>
                        <input type="month" name="experiencia_inicio_${contadorExperiencias}" style="width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 14px; font-weight: 500; color: #4a5568; margin-bottom: 8px; display: block;">📅 Período (Fim)</label>
                        <input type="month" name="experiencia_fim_${contadorExperiencias}" placeholder="Deixe vazio se atual" style="width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                </div>
                <div class="form-group">
                    <label style="font-size: 14px; font-weight: 500; color: #4a5568; margin-bottom: 8px; display: block;">📋 Principais atividades (opcional)</label>
                    <textarea name="experiencia_atividades_${contadorExperiencias}" rows="3" placeholder="Descreva brevemente suas principais responsabilidades..." style="width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; resize: vertical;"></textarea>
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
