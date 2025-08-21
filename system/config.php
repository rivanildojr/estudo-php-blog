<?php

    // Configurações do sistema
    date_default_timezone_set('America/Sao_Paulo'); // Define o fuso horário padrão

    // Informações do site
    define('SITE_NAME', 'Meu Blog');
    define('SITE_DESCRIPTION', 'Um blog sobre desenvolvimento web e tecnologia.');

    // URLs do site
    define('PRODUCTION_URL', 'http://meublog.com');
    define('DEVELOP_URL', 'http://localhost/blog');

    // Base URL do sistema
    define('BASE_URL', 'blog'); 

    // Configurações do banco de dados
    define('DB_HOST', 'localhost');
    define('DB_PORT', 3306);
    define('DB_NAME', 'blog');
    define('DB_USER', 'root');
    define('DB_PASS', 'rivanildojr');