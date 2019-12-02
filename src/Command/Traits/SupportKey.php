<?php


namespace App\Command\Traits;


trait SupportKey
{
    public function buildKey(int $day, int $part){
        return sprintf('d%dp%d', $day, $part);
    }
}