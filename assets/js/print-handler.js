/**
 * Print Handler - Função de Impressão e Download do Currículo
 * APO - Fundamentos de Programação para Internet
 */

// Função principal de impressão
function imprimirCurriculo() {
    // Ocultar elementos que não devem ser impressos
    const elementosNoprint = document.querySelectorAll('.no-print');
    elementosNoprint.forEach(el => {
        el.style.display = 'none';
    });
    
    // Ajustar estilos para impressão
    document.body.classList.add('printing');
    
    // Executar impressão
    window.print();
    
    // Restaurar elementos após impressão
    setTimeout(() => {
        elementosNoprint.forEach(el => {
            el.style.display = '';
        });
        document.body.classList.remove('printing');
    }, 1000);
}

// Função alternativa usando nova janela
function imprimirCurriculoNovaJanela() {
    // Criar uma nova janela
    const printWindow = window.open('', '_blank', 'width=800,height=600');
    
    // Obter o conteúdo do currículo
    const curriculoContent = document.getElementById('curriculo-preview').innerHTML;
    
    // Estilos para impressão
    const printStyles = `
        <style>
            @page {
                size: A4;
                margin: 20mm;
            }
            
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                margin: 0;
                padding: 20px;
            }
            
            .curriculo-header {
                text-align: center;
                border-bottom: 3px solid #2c3e50;
                padding-bottom: 15px;
                margin-bottom: 25px;
            }
            
            .curriculo-header h1 {
                color: #2c3e50;
                font-size: 28pt;
                margin: 0 0 10px 0;
            }
            
            .info-pessoal {
                color: #7f8c8d;
                font-size: 11pt;
                margin: 5px 0;
            }
            
            .curriculo-section {
                margin-bottom: 25px;
                page-break-inside: avoid;
            }
            
            .curriculo-section h2 {
                color: #2c3e50;
                font-size: 16pt;
                font-weight: bold;
                margin-bottom: 12px;
                padding-bottom: 5px;
                border-bottom: 2px solid #3498db;
            }
            
            .experiencia-item, .formacao-item {
                margin-bottom: 15px;
                padding-left: 15px;
                border-left: 3px solid #3498db;
                page-break-inside: avoid;
            }
            
            .experiencia-item h3, .formacao-item h3 {
                color: #2c3e50;
                font-size: 12pt;
                font-weight: 600;
                margin: 0 0 5px 0;
            }
            
            .empresa, .instituicao {
                color: #7f8c8d;
                font-style: italic;
                margin-bottom: 3px;
            }
            
            .periodo {
                color: #95a5a6;
                font-size: 10pt;
                margin-bottom: 8px;
            }
            
            .descricao {
                margin-top: 8px;
                text-align: justify;
            }
            
            .habilidades-list {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                margin-top: 10px;
            }
            
            .habilidade-badge {
                background-color: #3498db;
                color: white;
                padding: 6px 12px;
                border-radius: 15px;
                font-size: 10pt;
                display: inline-block;
            }
            
            .referencia-item {
                margin-bottom: 12px;
                padding: 10px;
                background-color: #f8f9fa;
                border-radius: 5px;
                page-break-inside: avoid;
            }
            
            .no-print {
                display: none !important;
            }
            
            @media print {
                body {
                    padding: 0;
                }
                
                .experiencia-item, .formacao-item, .referencia-item {
                    page-break-inside: avoid;
                }
            }
        </style>
    `;
    
    // Montar o documento HTML completo
    const printHTML = `
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Currículo - Download</title>
            ${printStyles}
        </head>
        <body>
            ${curriculoContent}
            <script>
                window.onload = function() {
                    // Aguardar um pouco para garantir que tudo carregou
                    setTimeout(function() {
                        window.print();
                        
                        // Fechar a janela após impressão (opcional)
                        window.onafterprint = function() {
                            window.close();
                        };
                    }, 500);
                };
            </script>
        </body>
        </html>
    `;
    
    // Escrever o conteúdo na nova janela
    printWindow.document.open();
    printWindow.document.write(printHTML);
    printWindow.document.close();
}

// Função para baixar como PDF (requer jsPDF - opcional)
function baixarComoPDF() {
    // Verificar se jsPDF está disponível
    if (typeof jsPDF === 'undefined') {
        alert('Biblioteca jsPDF não está carregada. Use a função de impressão do navegador.');
        window.print();
        return;
    }
    
    // Criar nova instância do jsPDF
    const doc = new jsPDF('p', 'mm', 'a4');
    
    // Obter dados do currículo (simplificado)
    const nome = document.querySelector('.curriculo-header h1').textContent;
    
    // Adicionar conteúdo ao PDF
    doc.setFontSize(22);
    doc.text(nome, 105, 20, { align: 'center' });
    
    // Adicionar mais conteúdo conforme necessário
    // ...
    
    // Salvar o PDF
    doc.save('curriculo.pdf');
}

// Função para salvar dados localmente (localStorage)
function salvarRascunho() {
    const formData = new FormData(document.getElementById('formCurriculo'));
    const data = {};
    
    for (let [key, value] of formData.entries()) {
        data[key] = value;
    }
    
    localStorage.setItem('curriculo_rascunho', JSON.stringify(data));
    alert('Rascunho salvo com sucesso!');
}

// Função para carregar rascunho
function carregarRascunho() {
    const rascunho = localStorage.getItem('curriculo_rascunho');
    
    if (!rascunho) {
        alert('Nenhum rascunho encontrado.');
        return;
    }
    
    const data = JSON.parse(rascunho);
    
    // Preencher o formulário com os dados
    for (let key in data) {
        const input = document.querySelector(`[name="${key}"]`);
        if (input) {
            input.value = data[key];
        }
    }
    
    alert('Rascunho carregado!');
}

// Função para limpar rascunho
function limparRascunho() {
    if (confirm('Tem certeza que deseja apagar o rascunho salvo?')) {
        localStorage.removeItem('curriculo_rascunho');
        alert('Rascunho removido!');
    }
}

// Event listeners quando o documento carregar
document.addEventListener('DOMContentLoaded', function() {
    // Adicionar event listener para botão de impressão
    const btnImprimir = document.getElementById('btnImprimir');
    if (btnImprimir) {
        btnImprimir.addEventListener('click', imprimirCurriculo);
    }
    
    // Adicionar event listener para botão de download
    const btnDownload = document.getElementById('btnDownload');
    if (btnDownload) {
        btnDownload.addEventListener('click', imprimirCurriculoNovaJanela);
    }
    
    // Adicionar event listener para salvar rascunho
    const btnSalvarRascunho = document.getElementById('btnSalvarRascunho');
    if (btnSalvarRascunho) {
        btnSalvarRascunho.addEventListener('click', salvarRascunho);
    }
    
    // Verificar se há rascunho salvo ao carregar a página
    if (localStorage.getItem('curriculo_rascunho')) {
        const carregarRascunhoBtn = document.createElement('button');
        carregarRascunhoBtn.textContent = 'Carregar Rascunho Salvo';
        carregarRascunhoBtn.className = 'btn btn-info';
        carregarRascunhoBtn.onclick = carregarRascunho;
        
        // Adicionar botão no início do formulário (se houver)
        const form = document.getElementById('formCurriculo');
        if (form) {
            form.insertBefore(carregarRascunhoBtn, form.firstChild);
        }
    }
});

// Exportar funções para uso global
window.imprimirCurriculo = imprimirCurriculo;
window.imprimirCurriculoNovaJanela = imprimirCurriculoNovaJanela;
window.baixarComoPDF = baixarComoPDF;
window.salvarRascunho = salvarRascunho;
window.carregarRascunho = carregarRascunho;
window.limparRascunho = limparRascunho;