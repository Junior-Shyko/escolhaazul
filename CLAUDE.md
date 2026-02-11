# CLAUDE.md

Este arquivo fornece orientações ao Claude Code (claude.ai/code) ao trabalhar com o código deste repositório.

## Visão Geral do Projeto

**Escolha Azul** é uma plataforma multi-tenant de gestão de propostas de aluguel, construída com Laravel 11 + Vue 3 + Inertia.js. Os usuários enviam propostas de aluguel com dados pessoais, documentos e informações de fiadores. Um painel administrativo (Filament 3) gerencia todos os dados.

## Stack Tecnológica

- **Backend**: Laravel 11, PHP 8.2
- **Frontend**: Vue 3 + Inertia.js, Tailwind CSS 3.4, Vuetify 3
- **Painel Admin**: Filament 3
- **Build**: Vite 4
- **Banco de Dados**: MySQL 5.7
- **Multi-tenancy**: Stancl Tenancy (baseado em domínio, banco separado por tenant)
- **Autenticação/RBAC**: Laravel Sanctum + Spatie Laravel Permission
- **PDF**: barryvdh/laravel-dompdf

## Comandos de Desenvolvimento (Docker)

```bash
# Buildar e iniciar containers
docker-compose build
docker-compose up -d

# Instalar dependências (dentro do container "ea")
docker-compose exec ea composer install
docker-compose exec ea npm install

# Configuração do banco de dados
docker-compose exec ea php artisan migrate
docker-compose exec ea php artisan db:seed
docker-compose exec ea php artisan key:generate
docker-compose exec ea php artisan cache:clear

# Corrigir permissões de storage
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache

# Iniciar servidor Vite (roda no container vite na porta 5173)
docker-compose exec ea npm run dev

# Build de produção
docker-compose exec ea npm run build
```

### Testes

```bash
docker-compose exec ea ./vendor/bin/phpunit                    # todos os testes
docker-compose exec ea ./vendor/bin/phpunit --testsuite=Unit   # apenas unitários
docker-compose exec ea ./vendor/bin/phpunit --testsuite=Feature # apenas feature
docker-compose exec ea ./vendor/bin/phpunit --filter=NomeDoTeste  # teste específico
```

### Formatação de Código

```bash
docker-compose exec ea ./vendor/bin/pint   # Laravel Pint (PHP CS Fixer)
```

## Serviços Docker

| Serviço | Container | Porta |
|---------|-----------|-------|
| PHP-FPM 8.2 | phpea | 9000 |
| Nginx | web_ea_local | 80 |
| MySQL 5.7 | mysql | 3306 |
| Redis | redis | 6379 |
| Vite (Node 18) | vite | 5173 |
| Mailpit | mailpit | 8025 (UI), 1025 (SMTP) |
| Memcached | memcached | 11211 |

## Arquitetura

### Camadas de Rotas

- **`routes/web.php`** - Páginas renderizadas com Inertia: welcome, dashboard, perfil, fluxo de formulário de proposta (`/formulario/proposta` -> `/formulario/termos` -> `/finalizar`)
- **`routes/api.php`** - API REST JSON sob prefixo `/api/` para operações CRUD em todas as entidades do domínio (endereço, banco, veículo, imóvel, fiador, etc.)
- **`routes/tenant.php`** - Rotas multi-tenant usando middleware `InitializeTenancyByDomain`
- **`routes/auth.php`** - Rotas de autenticação (Breeze)

### Modelos de Domínio e Relacionamentos

A entidade central é **RentalData** (proposta de aluguel), que se conecta a:
- **User** (solicitante) -> possui DataPersonal, Address, Phone, Bank, Professional
- **Property**, **Vehicle**, **Commercial**, **RealState** (bens)
- **Guarantor** (fiador, com fluxo de convite/aceite via email)
- **File** (documentos enviados)
- **Term** (termos aceitos)

### Painel Administrativo (Filament)

Localizado em `app/Filament/`. Resources para: User, RentalData, DataPersonal, RealState, Property, Vehicle, Professional, Phone, Permission, Role. Widgets do dashboard em `app/Filament/Widgets/`.

### Estrutura do Frontend

- **Pages**: `resources/js/Pages/` (páginas Inertia renderizadas pelos controllers)
- **Components**: `resources/js/Components/` (componentes Vue reutilizáveis)
- **Services**: `resources/js/Services/` (camada de chamadas API usando Axios)
- **Utilities**: `resources/js/Util/` (helpers, máscaras, validadores)
- **Layouts**: Layouts Guest e Authenticated em `resources/js/Layouts/`

### Multi-Tenancy

Configurado em `config/tenancy.php`. Usa identificação de tenant por domínio com bancos de dados separados (prefixo: `tenant`). Domínios centrais: localhost, 127.0.0.1. Provider de tenancy registrado em `app/Providers/TenancyServiceProvider.php`.

### Padrões da API

- Controllers da API usam padrão `createOrUpdate` para endpoints PUT (upsert)
- Uploads de arquivos passam pelo `FileController::store` com ID da proposta e tipo
- Consulta de endereço usa serviço externo BrasilAPI CEP (`VITE_API_CEP`)
- Sistema de fiador possui fluxo de verificação/aceite via links por email

## Ambiente

Variáveis `.env` principais: `DB_DATABASE=escolha_azul`, `DB_USERNAME=escolha`, `DB_PASSWORD=azul`. URL base da API configurada via `VITE_BASE_API`. O arquivo `.env` alimenta tanto a configuração da aplicação quanto os serviços do docker-compose.

## Convenções

- Idioma: o código usa termos em português para o domínio (proposta, fiador, imóvel, etc.)
- Mensagens de commit usam convenção gitmoji (`:rocket:`, `:technologist:`, etc.)
- Estratégia de branches: `master` (principal/produção), `develop` (integração), `feature/*` (branches de funcionalidades)
- Preferência de idioma: o desenvolvedor trabalha em português