<?php


namespace App\Handler;


use App\Command\Interfaces\CommandHandlerInterface;
use App\Command\Traits\SupportKey;

class DayPartHandler implements CommandHandlerInterface
{
    use SupportKey;

    /**
     * @var string
     */
    private $supportKey;

    protected function __construct(int $day, int $part)
    {
        $this->supportKey = $this->buildKey($day, $part);
    }

    public function listSupported(): array
    {
        return [$this->supportKey];
    }

    public function supports(string $key): bool
    {
        var_dump($this->supportKey);
        return $key === $this->supportKey;
    }

    public function handle(string $key, string $input): string
    {
        return '';
    }
}