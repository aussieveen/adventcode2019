<?php


namespace App\Command\Interfaces;


interface CommandHandlerInterface
{
    public function listSupported(): array;

    public function supports(string $key): bool;

    public function handle(string $key, string $input): string;
}