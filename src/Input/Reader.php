<?php


namespace App\Input;

use App\Exceptions\IOException\TooManyFilesException;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Finder\Finder;

class Reader
{

    private const PATH = 'inputs/';
    /**
     * @var Finder
     */
    private $finder;

    /**
     * Reader constructor.
     * @param Finder $finder
     */
    public function __construct()
    {
        $this->finder = new Finder();
    }

    /**
     * @param string $file
     * @return string
     */
    public function get(string $file): string
    {
        $this->finder->in(self::PATH)->files()->name($file);

        if(! $this->finder->hasResults() ){
            throw new FileNotFoundException();
        }

        $files = iterator_to_array($this->finder, false);
        return $files[0]->getContents();
    }
}