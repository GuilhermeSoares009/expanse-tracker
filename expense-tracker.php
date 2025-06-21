<?php

require_once __DIR__ . '/src/ExpenseManager.php';
require_once __DIR__ . '/src/ExpenseStorage.php';
require_once __DIR__ . '/src/Helpers.php';

/**
 * Nesta primeira linha irei pegar os argumentos enviados por script através de CLI
 */
$command = $argv[1] ?? "";

$storage = new ExpenseStorage(__DIR__ . '/data/expenses.json');
$manager = new ExpenseManager($storage);


switch ($command) {
    case 'add':
        break;
    case 'list':
        break;
    case 'summary':
        break;
    case 'delete':
        break;
    
    default:
        echo "Comando inválido. Use: add, list, summary, delete. \n";
        break;
}

?>