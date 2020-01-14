<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">PlaceU</h1>
    <br>
</p>

A aplicação “PlaceU” irá fazer uma gestão de salas de reuniões de uma empresa,
no que toca a requisição e disponibilidade das mesmas.
Vai ser composta por uma aplicação web, onde os administradores poderão
criar, apagar ou editar as salas.

## Install Steps
 - Create [VHost](#vhost) 'C:\xampp\apache\conf\extra\httpd-vhosts'
 - init.bat
 - composer install
 - Update dbname in 'common/config/main-local.php'
 - yii migrate --migrationPath=@yii/rbac/migrations
 - yii rbac/init
 - yii migrate

## DIRECTORY STRUCTURE

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

## <a name="vhost"/>Virtual Hosts

```
<VirtualHost *:80>
       ServerName admin.placeu.test
       DocumentRoot "C:\xampp\htdocs\web\backend\web"

       <Directory "C:\xampp\htdocs\web\backend\web">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
            # Apache 2.4
            Require all granted

            ## Apache 2.2
            # Order allow,deny
            # Allow from all
        </Directory>
</VirtualHost>

<VirtualHost *:80>
       ServerName placeu.test
       DocumentRoot "C:\xampp\htdocs\web\frontend\web"

        <Directory "C:\xampp\htdocs\web\frontend\web">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
            # Apache 2.4
            Require all granted

            ## Apache 2.2
            # Order allow,deny
            # Allow from all
        </Directory>
</VirtualHost> 
```
