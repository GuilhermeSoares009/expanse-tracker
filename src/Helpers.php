<?php

    function handleAdd(array $argv, ExpenseManager $manager): void {
        $description = getArgValue($argv, '--description');
        $amount = (float) getArgValue($argv, '--amount');

        if (!$description || $amount <= 0) {
            echo "Erro: descrição ou valor inválido. \n";
            return;
        }

        $manager->addExpense($description, $amount);
    }

    function handleSummary(array $argv, ExpenseManager $manager): void {
        $month = getArgValue($argv, '--month');
        $manager->summary($month ? (int)$month : null);
    }

    function handleDelete(array $argv, ExpenseManager $manager): void {
        $id = getArgValue($argv, '--id');
        if(!$id) {
            echo "Erro: ID inválido.\n";
            return;
        }
        $manager->deleteExpense($id);
    }

    /**
     * Ele pega o comando digitado que pode ser
     * --description ou --amount ou --month ou --id
     * caso encontre, ele devolve
     * exemplo: php script.php --nome João --idade 25
     * Na casa 02 do arrya seria "--nome" e na próxima seria o "João"
     * assim ele pega
     */
    function getArgValue(array $argv, string $name): ?string {
        foreach ($argv as $i => $argument) {
            if( $argument === $name && isset($argv[$i + 1])){
                return $argv[$i + 1];
            }
        }
        return null;
    }

?>