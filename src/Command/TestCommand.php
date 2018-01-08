<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure()
    {
       $this
        // the name of the command (the part after "bin/console")
        ->setName('app:test-command')

        // the short description shown while running "php bin/console list"
        ->setDescription('dump test')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('--help--')
    ;  
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        var_dump($this->getApplication());
        $output->writeln('test!');
    }
}