<?php

declare(strict_types=1);

namespace App\UI\Cli;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:bu', description: 'Bu super duper command')]
class BuCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Bu super duper command');
        return Command::SUCCESS;
    }
}
