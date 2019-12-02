<?php


namespace App\Exceptions\CommandArgument;


use Symfony\Component\Filesystem\Exception\IOException;

class UnsupportedArguments extends IOException
{
    /**
     * UnsupportedArguments constructor.
     */
    public function __construct()
    {
        parent::__construct('There is no handler set up to support your command line arguments');
    }
}