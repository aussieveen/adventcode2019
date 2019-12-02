<?php


namespace App\Handler;

class DayOnePartTwo extends DayPartHandler
{
    protected const DAY = 1;
    protected const PART = 2;

    public function __construct()
    {
        parent::__construct(self::DAY, self::PART);
    }

    public function handle(string $key, string $input): string
    {
        return 'dayOnePartTwo';
    }
}