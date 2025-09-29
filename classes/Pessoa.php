<?php
/**
 * Classe Pessoa
 * Gerencia dados pessoais do usuário
 */

class Pessoa {
    private $nome;
    private $email;
    private $telefone;
    private $dataNascimento;
    private $idade;
    private $endereco;
    private $cidade;
    private $estado;
    private $cep;
    private $objetivoProfissional;
    private $linkedin;
    private $github;
    
    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->setDados($dados);
        }
    }
    
    public function setDados($dados) {
        $this->nome = isset($dados['nome']) ? sanitize_input($dados['nome']) : '';
        $this->email = isset($dados['email']) ? filter_var($dados['email'], FILTER_VALIDATE_EMAIL) : '';
        $this->telefone = isset($dados['telefone']) ? sanitize_input($dados['telefone']) : '';
        $this->dataNascimento = isset($dados['data_nascimento']) ? $dados['data_nascimento'] : '';
        $this->endereco = isset($dados['endereco']) ? sanitize_input($dados['endereco']) : '';
        $this->cidade = isset($dados['cidade']) ? sanitize_input($dados['cidade']) : '';
        $this->estado = isset($dados['estado']) ? sanitize_input($dados['estado']) : '';
        $this->cep = isset($dados['cep']) ? sanitize_input($dados['cep']) : '';
        $this->objetivoProfissional = isset($dados['objetivo']) ? sanitize_input($dados['objetivo']) : '';
        $this->linkedin = isset($dados['linkedin']) ? sanitize_input($dados['linkedin']) : '';
        $this->github = isset($dados['github']) ? sanitize_input($dados['github']) : '';
        
        // Calcular idade
        if ($this->dataNascimento) {
            $this->calcularIdade();
        }
    }
    
    private function calcularIdade() {
        $nascimento = new DateTime($this->dataNascimento);
        $hoje = new DateTime();
        $this->idade = $nascimento->diff($hoje)->y;
    }
    
    // Getters
    public function getNome() { return $this->nome; }
    public function getEmail() { return $this->email; }
    public function getTelefone() { return $this->telefone; }
    public function getDataNascimento() { return $this->dataNascimento; }
    public function getIdade() { return $this->idade; }
    public function getEndereco() { return $this->endereco; }
    public function getCidade() { return $this->cidade; }
    public function getEstado() { return $this->estado; }
    public function getCep() { return $this->cep; }
    public function getObjetivoProfissional() { return $this->objetivoProfissional; }
    public function getLinkedin() { return $this->linkedin; }
    public function getGithub() { return $this->github; }
    
    public function toArray() {
        return [
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'data_nascimento' => $this->dataNascimento,
            'idade' => $this->idade,
            'endereco' => $this->endereco,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'cep' => $this->cep,
            'objetivo' => $this->objetivoProfissional,
            'linkedin' => $this->linkedin,
            'github' => $this->github
        ];
    }
}
?>