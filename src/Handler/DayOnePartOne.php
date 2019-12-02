<?php


namespace App\Handler;

class DayOnePartOne extends DayPartHandler
{
    protected const DAY = 1;
    protected const PART = 1;

    public function __construct()
    {
        parent::__construct(self::DAY, self::PART);
    }

    public function handle(string $key, string $input): string
    {
        return 'dayOnePartOne';
    }
}