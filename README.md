# teste-magnum


### Clone repositorio
````
git clone https://github.com/acrossicauda/teste-magnum.git
````

### Accessar pasta
````
teste-magnum
````

### Iniciar Docker
````
docker compose up --build
````

### Criar database
````
create database dinfluencers;
````

### migration com seed
````
php artisan migrate --seed
````

### Dados de login de teste
````
login: admin
pass: 123456789
````

### Testes via Insomnia
#### No repositório possui um arquivo json com os endpoints gerados pelo insomnia
````
Download:
https://insomnia.rest/download

Arquivo Insomnia_2024-12-17.json
````
#### Após importar o json na ferramenta, existem dois environments.
````
URL: http://localhost:8000
```` 
````
_TOKEN_JWT: Retorna do endpoint de login
````


## EndPoints

### Login
````
POST /api/login
````

### Logout
````
POST /api/logout
````

### Registrar novo usuario da API
````
POST /api/register
````

### Adicionar Influencer
````
POST /api/set-influencer
````

### Listar Influencers
````
GET /api/influencers
````

### Adicionar Campanha
````
POST /api/set-campanha
````

### Listar campanhas
````
GET /api/campanhas
````

### Vincular influencers e campanhas
````
POST /api/vincular-influencer
````

### Listar campanhas e seus influencers
````
GET /api//listar-vinculos
````