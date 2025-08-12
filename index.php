<?php 
    /* Arquivo responsável pela inicialização do sistema */
    declare(strict_types=1); // Habilita a verificação estrita de tipos

    // Inclui os arquivos de configuração e funções auxiliares

    require_once 'system/config.php';
    include_once 'helpers.php';

    echo greeting();
    echo '<br>';

    $url = 'http://unset.';
    echo '<br>';
    echo slugfy('   `^`SDSfasd90a`` sdfasd0 asdf2â 55   ')
?>