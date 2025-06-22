FROM php:8.2-cli

WORKDIR /app

COPY . .

RUN chmod -R 777 /app/data

CMD [ "php", "expense-tracker.php" ]
