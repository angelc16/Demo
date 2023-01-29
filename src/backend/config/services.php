<?php

return [
    \PDO::class => \DI\create()->constructor(
        sprintf('mysql:dbname=%s;host=%s;port=%s', $_ENV['DB_NAME'], $_ENV['DB_HOST'], $_ENV['DB_PORT']),
        $_ENV['DB_USER'],
        $_ENV['DB_PASS'],
        [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
    ),
    Demo\Domain\ClientRepositoryInterface::class => \DI\get(\Demo\Infrastructure\Repository\ClientRepositoryMySql::class),
    Demo\Domain\TransactionRepositoryInterface::class => \DI\get(\Demo\Infrastructure\Repository\TransactionRepositoryMySql::class)
];