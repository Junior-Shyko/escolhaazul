# O Projeto e Objetivo

Um projeto de código aberto para todos usarem e contribuírem.
O objetivo da aplicação é ter a primissia de enviar seus dados para ser guardado em um banco de dados junto com seus documentos.
Aplicação também terá um painel com duas áreas a do cliente que poderá editar uma proposta sua enviada e uma outra para gerenciar
todos os dados que estão no banco de dados.

## Instação
Instalação básica do laravel versão 10 com o Docker
 - docker-compose build
 - docker-compose up -d	
 - 
	 ### Configuração 
	 - O arquivo .env armazena os valores para o docker-compose.yml
	 - Rodar o comando `docker-compose exec ea composer install`
	 - Rodar o comando `docker-compose exec ea php artisan migrate`
	 - Rodar o comando `docker-compose exec ea php artisan key:generate`
	 - Rodar o comando `docker-compose exec ea php artisan cache:clear`
	 - Rodar o comando `sudo chgrp -R www-data storage bootstrap/cache`
	 - Rodar o comando `sudo chmod -R ug+rwx storage bootstrap/cache`
	 - Rodar o comando `docker-compose exec ea npm install`
     - Rodar o comando `docker-compose exec ea npm run dev`
	 - Se precisar, dê permissão em alguns arquivo para o seu usuário

	  ### Docker 
	 - Domandos docker para uso do app
	 - Rodar o comando para buildar a imagem: `docker-compose build --no-cache`
	 - Rodar o comando para parar os containers `docker-compose down`
	 - Rodar o comando para iniciar os containers `docker-compose up -d`

## Create files and folders

The file explorer is accessible using the button in left corner of the navigation bar. You can create a new file by clicking the **New file** button in the file explorer. You can also create folders by clicking the **New folder** button.
$$

> You can find more information about **LaTeX** mathematical expressions [here](http://meta.math.stackexchange.com/questions/5020/mathjax-basic-tutorial-and-quick-reference).


## UML diagrams

Todo o nosso material de diagramas e seus relacionamentos se encontram no [Google Drive](https://drive.google.com/drive/u/1/folders/1fyMmkkZiwzbafcM9X1VycNyDkR2N2nuH) e nas [Issues](https://github.com/Junior-Shyko/escolhaazul/issues) no Board do [Projeto](https://github.com/users/Junior-Shyko/projects/5)

