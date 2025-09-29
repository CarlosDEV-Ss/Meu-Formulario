# 📄 Gerador de Currículos Online

## 📋 Sobre o Projeto

Sistema web para geração automática de currículos profissionais, desenvolvido como **Atividade Prática Orientada (APO)** para a disciplina de **Fundamentos de Programação para Internet**.

O sistema permite que usuários criem currículos profissionais de forma rápida e intuitiva, com recursos de campos dinâmicos, validação de dados e geração de documento formatado para impressão ou download.

## 🚀 Tecnologias Utilizadas

- **PHP 7.4+** - Processamento backend e lógica de negócio
- **HTML5** - Estrutura das páginas
- **CSS3** - Estilização e layout
- **JavaScript** - Interatividade e validações
- **jQuery** - Manipulação DOM e AJAX
- **Bootstrap 5** - Framework CSS responsivo
- **Git / GitHub** - Controle de versão
- **XAMPP** - Ambiente de desenvolvimento local

## 💻 Pré-requisitos

Antes de começar, você precisa ter instalado em sua máquina:

- [XAMPP](https://www.apachefriends.org/) (inclui PHP 7.4+ e Apache)
- Navegador moderno (Chrome, Firefox, Edge)
- [Git](https://git-scm.com/) (opcional, para controle de versão)

## 🔧 Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/gerador-curriculos.git
```

### 2. Mova o projeto para a pasta htdocs do XAMPP

```bash
# Windows
copy gerador-curriculos C:\xampp\htdocs\

# Linux/Mac
cp -r gerador-curriculos /opt/lampp/htdocs/
```

### 3. Inicie o Apache no XAMPP

- Abra o painel de controle do XAMPP
- Inicie o módulo Apache
- Aguarde o status ficar verde

### 4. Acesse o projeto

Abra seu navegador e acesse:
```
http://localhost/gerador-curriculos
```

## 📖 Como Usar

1. **Acesse a página inicial** do sistema
2. **Clique em "Criar Novo Currículo"** para começar
3. **Preencha seus dados pessoais** (nome, email, telefone, etc.)
4. **Adicione experiências profissionais** usando o botão "+" (campos dinâmicos)
5. **Adicione sua formação acadêmica**
6. **Inclua habilidades e referências pessoais**
7. **Visualize o preview do currículo** antes de finalizar
8. **Faça o download ou imprima** seu currículo

## 🎯 Funcionalidades

### ✅ Implementadas

- [x] Formulário de dados pessoais com validação
- [x] Cálculo automático de idade baseado na data de nascimento
- [x] Adição/remoção de campos dinâmicos (experiências, formações)
- [x] Validação de formulários em tempo real
- [x] Preview do currículo antes da geração final
- [x] Função de impressão/download usando `window.print()`
- [x] Design responsivo com Bootstrap 5
- [x] Interface intuitiva e profissional
- [x] Múltiplos templates de currículo

### 🔄 Em Desenvolvimento

- [ ] Geração de PDF direto pelo sistema
- [ ] Salvamento de currículos no banco de dados
- [ ] Sistema de login para gerenciar múltiplos currículos
- [ ] Mais templates de design

## 📂 Estrutura do Projeto

```
gerador-curriculos/
│
├── assets/
│   ├── css/
│   │   └── style.css              # Estilos customizados
│   ├── js/
│   │   ├── main.js                # Scripts principais
│   │   └── print-handler.js       # Função de impressão
│   └── img/
│       └── logo.png                # Logo do sistema
│
├── classes/
│   ├── Curriculo.php               # Classe principal do currículo
│   └── Pessoa.php                  # Classe de dados pessoais
│
├── includes/
│   ├── header.php                  # Cabeçalho comum
│   ├── footer.php                  # Rodapé comum
│   └── config.php                  # Configurações do sistema
│
├── pages/
│   ├── form-dados-pessoais.php     # Formulário de dados
│   └── preview.php                 # Preview do currículo
│
├── templates/
│   ├── curriculo-template-1.php    # Template moderno
│   └── curriculo-template-2.php    # Template clássico
│
├── index.php                       # Página inicial
├── process.php                     # Processamento dos dados
├── .gitignore                      # Arquivos ignorados pelo Git
└── README.md                       # Este arquivo
```

## 🎨 Capturas de Tela

_Em breve: Adicionar screenshots do sistema funcionando_

## 👨‍💻 Desenvolvimento

### Commits Semânticos

Este projeto utiliza commits semânticos para melhor organização:

- `feat:` - Nova funcionalidade
- `fix:` - Correção de bug
- `style:` - Mudanças de estilo/formatação
- `docs:` - Atualização de documentação
- `refactor:` - Refatoração de código

### Exemplo:
```bash
git commit -m "feat: adicionar validação de email no formulário"
```

## 🐛 Problemas Conhecidos

Nenhum problema conhecido no momento. Se encontrar algum bug, por favor abra uma [issue](https://github.com/seu-usuario/gerador-curriculos/issues).

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👤 Autor

**[Seu Nome Completo]**

- RA: [Seu RA]
- Curso: [Seu Curso]
- Polo: [Seu Polo]
- Instituição: **UNIPAR EAD**

📧 Email: [seu.email@example.com]  
🔗 LinkedIn: [seu-linkedin](https://linkedin.com/in/seu-perfil)  
💻 GitHub: [@seu-usuario](https://github.com/seu-usuario)

## 🙏 Agradecimentos

- Professor Carlos Eduardo Simões Pelegrin
- UNIPAR EAD
- Colegas de turma

---

⭐ **Se este projeto foi útil para você, considere dar uma estrela no repositório!**

*Desenvolvido com ❤️ para a disciplina de Fundamentos de Programação para Internet*