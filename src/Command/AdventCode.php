<?php


namespace App\Command;

use App\Command\Traits\SupportKey;
use App\Input\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class AdventCode extends Command
{

    use SupportKey;

    protected static $defaultName = 'app:basic';

    /**
     * @var Reader
     */
    private $reader;
    /**
     * @var Delegate
     */
    private $delegate;
    /**
     * @var SupportKey
     */
    private $supportKeyFactory;

    public function __construct(Delegate $delegate, Reader $reader)
    {
        parent::__construct();
        $this->delegate = $delegate;
        $this->reader = $reader;
    }

    protected function configure(): void
    {
        $this->setDescription('Advent Code 2019')
            ->setHelp('Command for running AdventCode 2019 problems')
            ->addArgument(
                'day',
                InputArgument::REQUIRED,
                'The day you want to run'
            )
            ->addArgument(
                'part',
                InputArgument::REQUIRED,
                'The part of the day you want to run'
            )
            ->addArgument(
                'fileName',
                InputArgument::REQUIRED,
                'The name of the file containing the input text for the problem'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $fileContents = $this->reader->get($input->getArgument('fileName'));
        } catch (FileNotFoundException $e){
            $output->writeln($e->getMessage());
            return 0;
        }

        $result = $this->delegate->handle(
            $this->buildKey($input->getArgument('day'), $input->getArgument('part')),
            $fileContents
        );

        $output->writeln($result);
        return 1;
    }

}