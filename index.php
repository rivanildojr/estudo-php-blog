<?php 
    /* Arquivo responsável pela inicialização do sistema */
    declare(strict_types=1); // Habilita a verificação estrita de tipos

    // Inclui o autoload do Composer
    require 'vendor/autoload.php';

    use system\core\Helpers\Helpers;

    $helper = new Helpers();
    echo Helpers::greeting();

    echo SITE_NAME . '<br>';
?>