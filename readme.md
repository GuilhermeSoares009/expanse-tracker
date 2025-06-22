## Projeto - Rastreamento de despesas

Projeto desenvolvido com o intuito de rever alguns conceitos do php e também de melhorar a lógica da resuolução de desafios.

1. Clone o repositório
2. Execute os comandos abaixo:

```bash
# Adicionar despesa
docker-compose run --rm expense-tracker add --description "Café" --amount 5

# Listar despesas
docker-compose run --rm expense-tracker list

# Ver resumo
docker-compose run --rm expense-tracker summary --month 6
