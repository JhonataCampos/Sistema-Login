# Sistema-Login

Este é um projeto simples que simula o funcionamento de um sistema de login com dois níveis de acesso: administrador e usuário.

## Instalação

Para que a a aplicação funcione, você precisará de um servidor que rode PHP e um servidor para o BD. É recomendado que se use o software XAMPP, já que o mesmo possui tanto o phpMyAdmin e o Apache já disponíveis para uso.

O software pode ser encontrado em:

```bash
https://www.apachefriends.org/pt_br/download.html
```

Feitos ambos download e instalação, é necessário fazer o download do projeto e configurá-lo para que possa rodar em sua máquina :D
Então, façamos isso:

Se você usar Linux:
```bash
cd /opt/lampp/htdocs
git clone https://github.com/JhonataCampos/Sistema-Login.git
```
Se você usar Windows:
```bash
cd C:\xampp\htdocs
git clone https://github.com/JhonataCampos/Sistema-Login.git
```
Caso não tenha o Git instalado, basta fazer o download do projeto e extrair nos caminhos indicados acima (de acordo com seu SO).

E pronto! Sua aplicação está pronta para ser usada :D

## Como usar?

Agora que está tudo pronto, basta que você inicie o servidor, importe o BD, e pronto!
Para fazer isso, primeiramente precisamos iniciar o XAMPP para que possamos ativar o phpMyAdmin e o servidor Apache.

No Linux, basta abrir o terminal e digitar:

```bash
sudo /opt/lampp/manager-linux.run
```
No Windows, basta você ir até o diretório

```bash
C:\xampp
```
E executar o aplicativo "xampp-control".

Em ambos os casos, uma janela como esta aparecerá:

![Xampp-Control](https://github.com/JhonataCampos/Sistema-Login/blob/master/readme/xampp.JPG)

Aperte "start" nas linhas Apache e MySQL, e o serviços começarão a rodar em segundo plano, e sua página já estará no ar!

E agora, a última parte: Subir o BD para o phpMyAdmin.
Vá no seu navegador, e digite:

```bash
http://localhost/phpmyadmin/
```

Esta janela vai aparecer:

![phpMyAdmin - 1](https://github.com/JhonataCampos/Sistema-Login/blob/master/readme/sql1.JPG)

Clique em "novo", no canto superior esquerdo. Esta janela irá aparecer:

![phpMyAdmin - 2](https://github.com/JhonataCampos/Sistema-Login/blob/master/readme/sql3.JPG)

Nomeie a nova Base de Dados como "usuarios" e selecione "criar". Logo após, Clique em "Importar":

![phpMyAdmin - 3](https://github.com/JhonataCampos/Sistema-Login/blob/master/readme/sql2.JPG)

Clique em "Escolher arquivo", e vá até:

```bash
C:\xampp\htdocs\Sistema-Login\usuarios.sql
```

Depois disso, vá até o final da página e clique em "Importar" e... Pronto! Agora é só criar uma nova aba no seu navegador e digitar:

```bash
http://localhost/Sistema-Login/login.php
```
Divirta-se!

## Contribuições
Contribuições são sempre bem-vindas! Este foi um projeto pessoal, e minha primeira experiência com PHP e SQL. Com certeza me serviu de muito aprendizado, e seria muito bom ter pessoas ajudando a aprimorar este crescente projeto :D
