<?php

class ExpenseManager {

    private $storage;

    public function __construct(ExpenseStorage $storage) {
        // O que ele carregou aqui?
        $this->storage = $storage;
    }

    public function addExpense(string $description, float $amount) {
        // Por que o load?
        $expenses = $this->storage->load();

        $expenses[] = [
            'id' => uniqid(),
            'date' => date('Y-m-d'),
            'amount' => $amount
        ];

        $this->storage->save($expenses);
        echo "Despesa adicionada com suceso. \n";
    }

    public function deleteExpense($id){
        $expenses = $this->storage->load();

        echo "# ID | Data          | Descrição  | Valor \n";

        foreach ($expenses as $expense) {
            echo "# {$expense['id'] | $expense['date'] | $expense['description'] | \$expense['id']} \n";
        }
        
    }
    
    public function listExpense(){}

}

?>