<?php

class ExpenseManager {

    private $storage;

    public function __construct(ExpenseStorage $storage) {
        $this->storage = $storage;
    }

    public function addExpense(string $description, float $amount) {
        $expenses = $this->storage->load();

        $expenses[] = [
            'id' => uniqid(),
            'date' => date('Y-m-d'),
            'date' => $description,
            'amount' => $amount
        ];

        $this->storage->save($expenses);
        echo "Despesa adicionada com suceso. \n";
    }


    
    public function listExpense(): void {
        $expenses = $this->storage->load();

        echo "# ID | Data          | Descrição  | Valor \n";

        foreach ($expenses as $expense) {
            echo "# {$expense['id']} | {$expense['date']} | {$expense['description']} | \${$expense['id']} \n";
        }
        

    }

    public function deleteExpense($id){
       $expenses = $this->storage->load();
       $filtered = array_filter($expenses, fn($expense) => $expense['id'] !== $id);

       $this->storage->save(array_values($filtered));
       echo "Depesa removida com sucesso \n";
    }

    public function summary(?int $month = null) : void {
        $expenses = $this->storage->load();
        $total = 0;
        $flagDatesMonths = 'n';

        foreach ($expenses as $expense) {
            // esse n no date é uma flag para indicar os meses de 1 a 12
            $expenseMonth = (int)date($flagDatesMonths, strtotime($expense['date']));
            if (is_null($month) || $expenseMonth === $month ) {
                $total += $expense['amount'];
            }
        }

    echo 'Total de despesas'. ($month ? " para o mês $month" : "") . ": \$$total\n";

    }


}

?>