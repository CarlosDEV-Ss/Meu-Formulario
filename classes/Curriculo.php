<?php
/**
 * Classe Curriculo
 * Gerencia todos os dados do currículo
 */

class Curriculo {
    private $pessoa;
    private $experiencias;
    private $formacoes;
    private $habilidades;
    private $referencias;
    private $idiomas;
    
    public function __construct() {
        $this->pessoa = null;
        $this->experiencias = [];
        $this->formacoes = [];
        $this->habilidades = [];
        $this->referencias = [];
        $this->idiomas = [];
    }
    
    // Métodos para Pessoa
    public function setPessoa($dadosPessoa) {
        $this->pessoa = new Pessoa($dadosPessoa);
    }
    
    public function getPessoa() {
        return $this->pessoa;
    }
    
    // Métodos para Experiências
    public function adicionarExperiencia($experiencia) {
        $exp = [
            'cargo' => isset($experiencia['cargo']) ? sanitize_input($experiencia['cargo']) : '',
            'empresa' => isset($experiencia['empresa']) ? sanitize_input($experiencia['empresa']) : '',
            'data_inicio' => isset($experiencia['data_inicio']) ? $experiencia['data_inicio'] : '',
            'data_fim' => isset($experiencia['data_fim']) ? $experiencia['data_fim'] : '',
            'atual' => empty($experiencia['data_fim']),
            'descricao' => isset($experiencia['descricao']) ? sanitize_input($experiencia['descricao']) : ''
        ];
        $this->experiencias[] = $exp;
    }
    
    public function getExperiencias() {
        return $this->experiencias;
    }
    
    // Métodos para Formações
    public function adicionarFormacao($formacao) {
        $form = [
            'curso' => isset($formacao['curso']) ? sanitize_input($formacao['curso']) : '',
            'instituicao' => isset($formacao['instituicao']) ? sanitize_input($formacao['instituicao']) : '',
            'tipo' => isset($formacao['tipo']) ? sanitize_input($formacao['tipo']) : '',
            'data_inicio' => isset($formacao['data_inicio']) ? $formacao['data_inicio'] : '',
            'data_fim' => isset($formacao['data_fim']) ? $formacao['data_fim'] : '',
            'cursando' => empty($formacao['data_fim']),
            'descricao' => isset($formacao['descricao']) ? sanitize_input($formacao['descricao']) : ''
        ];
        $this->formacoes[] = $form;
    }
    
    public function getFormacoes() {
        return $this->formacoes;
    }
    
    // Métodos para Habilidades
    public function adicionarHabilidade($habilidade) {
        $hab = [
            'nome' => isset($habilidade['nome']) ? sanitize_input($habilidade['nome']) : '',
            'nivel' => isset($habilidade['nivel']) ? sanitize_input($habilidade['nivel']) : 'intermediario'
        ];
        $this->habilidades[] = $hab;
    }
    
    public function getHabilidades() {
        return $this->habilidades;
    }
    
    // Métodos para Referências
    public function adicionarReferencia($referencia) {
        $ref = [
            'nome' => isset($referencia['nome']) ? sanitize_input($referencia['nome']) : '',
            'cargo' => isset($referencia['cargo']) ? sanitize_input($referencia['cargo']) : '',
            'empresa' => isset($referencia['empresa']) ? sanitize_input($referencia['empresa']) : '',
            'telefone' => isset($referencia['telefone']) ? sanitize_input($referencia['telefone']) : '',
            'email' => isset($referencia['email']) ? filter_var($referencia['email'], FILTER_VALIDATE_EMAIL) : ''
        ];
        $this->referencias[] = $ref;
    }
    
    public function getReferencias() {
        return $this->referencias;
    }
    
    // Métodos para Idiomas
    public function adicionarIdioma($idioma) {
        $idi = [
            'nome' => isset($idioma['nome']) ? sanitize_input($idioma['nome']) : '',
            'nivel' => isset($idioma['nivel']) ? sanitize_input($idioma['nivel']) : 'basico'
        ];
        $this->idiomas[] = $idi;
    }
    
    public function getIdiomas() {
        return $this->idiomas;
    }
    
    // Validação
    public function validar() {
        $erros = [];
        
        if (!$this->pessoa || empty($this->pessoa->getNome())) {
            $erros[] = "Nome é obrigatório";
        }
        
        if (!$this->pessoa || empty($this->pessoa->getEmail())) {
            $erros[] = "Email é obrigatório";
        }
        
        if (empty($this->experiencias) && empty($this->formacoes)) {
            $erros[] = "Adicione pelo menos uma experiência ou formação";
        }
        
        return empty($erros) ? true : $erros;
    }
    
    // Exportar dados
    public function toArray() {
        return [
            'pessoa' => $this->pessoa ? $this->pessoa->toArray() : [],
            'experiencias' => $this->experiencias,
            'formacoes' => $this->formacoes,
            'habilidades' => $this->habilidades,
            'referencias' => $this->referencias,
            'idiomas' => $this->idiomas
        ];
    }
    
    // Gerar HTML do currículo
    public function gerarHTML($template = 'template-1') {
        $templateFile = TEMPLATES_PATH . '/curriculo-' . $template . '.php';
        
        if (!file_exists($templateFile)) {
            $templateFile = TEMPLATES_PATH . '/curriculo-template-1.php';
        }
        
        ob_start();
        $curriculo = $this;
        include $templateFile;
        return ob_get_clean();
    }
}
?>