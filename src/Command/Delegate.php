<?php


namespace App\Command;


use App\Command\Interfaces\CommandHandlerInterface;
use App\Exceptions\CommandArgument\UnsupportedArguments;

class Delegate implements CommandHandlerInterface
{
    /**
     * @var CommandHandlerInterface[]
     */
    private $handlers;

    public function __construct(CommandHandlerInterface ...$handlers)
    {
        $this->handlers = $handlers;
    }

    public function listSupported(): array
    {
        $supports = [];

        foreach ($this->handlers as $handler) {
            $supports[] = $handler->listSupported();
        }
        return array_merge([], ...$supports);
    }

    public function supports(string $key): bool
    {
        return (bool) $this->getHandler($key);
    }

    public function handle(string $key, string $input = ''): string
    {
        var_dump($key);
        $handler = $this->getHandler($key);
        if ($handler === null) {
            throw new UnsupportedArguments();
        }

        return $handler->handle($key, $input);
    }

    protected function getHandler(string $key): ?CommandHandlerInterface
    {
        foreach ($this->handlers as $handler) {
            if ($handler->supports($key)) {
                return $handler;
            }
        }

        return null;
    }
}