<?php

class ExpenseManager
{

    private $expenseStorage;

    public function __construct(ExpenseStorage $expenseStorage)
    {
        $this->expenseStorage = $expenseStorage;
    }

    public function addExpense(string $description, float $amount): void
    {
        $expenses = $this->expenseStorage->load();

        $expenses[] = [
            'id' => uniqid(),
            'date' => date('Y-m-d'),
            'date' => $description,
            'amount' => $amount
        ];

        $this->expenseStorage->save($expenses);
        echo "Despesa adicionada com suceso. \n";
    }

    public function listExpense(): void
    {
        $expenses = $this->expenseStorage->load();

        echo "# ID | Data          | Descrição  | Valor \n";

        foreach ($expenses as $expense) {
            echo "# {$expense['id']} | {$expense['date']} | {$expense['description']} | \${$expense['id']} \n";
        }
    }

    public function deleteExpense($id): void
    {
        $expenses = $this->expenseStorage->load();
        // Neste trecho se pegam todos gastos menos o que passei para ser evitado
        $filtered = array_filter($expenses, fn($expense) => $expense['id'] !== $id);

        // salvo todos os gastos filtrados e excluo o que estava fora do filtro
        $this->expenseStorage->save(array_values($filtered));
        echo "Depesa removida com sucesso \n";
    }

    public function summary(?int $month = null): void
    {
        $expenses = $this->expenseStorage->load();
        $total = 0;
        $flagDatesMonths = 'n';

        foreach ($expenses as $expense) {
            // esse n no date é uma flag para indicar os meses de 1 a 12
            $expenseMonth = (int)date($flagDatesMonths, strtotime($expense['date']));
            if (is_null($month) || $expenseMonth === $month) {
                $total += $expense['amount'];
            }
        }

        echo 'Total de despesas' . ($month ? " para o mês $month" : "") . ": \$$total\n";
    }
}
