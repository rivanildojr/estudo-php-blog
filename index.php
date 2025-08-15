<?php 
    /* Arquivo responsável pela inicialização do sistema */
    declare(strict_types=1); // Habilita a verificação estrita de tipos

    // Inclui os arquivos de configuração e funções auxiliares

    require_once 'system/config.php';
    include_once 'helpers.php';
    include_once 'system/core/Mensage/Mensage.php';

    use Core\Mensage\Mensage;

    echo greeting();
    echo '<br>';

    $mensage = new Mensage();

    echo $mensage->success('mensagem de sucesso')->render();
    echo $mensage->error('mensagem de erro')->render();
    echo $mensage->alert('mensagem de alerta')->render();
    echo $mensage->info('mensagem de info')->render();
    echo $mensage->info('mensagem de info');
?>