# Conversor de Números Romanos

Este é um simples conversor de números que permite a conversão de números arábicos para romanos e de romanos para arábicos. O projeto foi desenvolvido em Laravel e inclui uma interface amigável para facilitar a utilização.

## Funcionalidades

-   **Conversão de Arábico para Romano:** Converta qualquer número inteiro positivo em seu equivalente em numerais romanos.
-   **Conversão de Romano para Arábico:** Converta qualquer numeral romano válido em seu equivalente em números inteiros.

## Requisitos

-   PHP >= 8.0
-   Composer
-   Laravel >= 8.0
-   Um servidor web como Apache ou Nginx

## Instalação

Siga as instruções abaixo para configurar e rodar o projeto localmente.

### Passo 1: Clone o Repositório

Clone este repositório para sua máquina local usando o seguinte comando:

```bash
git clone https://github.com/marcellacamara/roman_converter.git
```

### Passo 2: Instale as Dependências

Navegue até o diretório do projeto e instale as dependências do Composer:

```bash
cd roman_converter
composer install
```

### Passo 3: Configure o Ambiente

Copie o arquivo .env.example para .env e configure suas variáveis de ambiente. Certifique-se de configurar a conexão com o banco de dados, mesmo que não seja utilizado diretamente no projeto:

```bash
cp .env.example .env
php artisan key:generate
```

### Passo 4: Inicie o Servidor

Inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

Isso iniciará o servidor em http://localhost:8000.

Desenvolvido com ♥ por Marcella Câmara.
