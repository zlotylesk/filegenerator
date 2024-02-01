<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Report;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'report:generate:excel',
    description: 'Generate Excel file with random data',
)]
class ReportGenerateExcelCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::REQUIRED, 'Report name')
            ->addArgument('dateFrom', InputArgument::OPTIONAL, 'Start report date')
            ->addArgument('dateTo', InputArgument::OPTIONAL, 'End report date')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $name = $input->getArgument('arg1');
        $dateFrom = $input->getArgument('dateFrom');
        $dateTo = $input->getArgument('dateTo');

        $report = new Report($name, $dateFrom, $dateTo);

        try {
            $io->success('File has been gen');
        } catch (\Exception $exception) {
            $io->error(sprintf('Unable to generate file. Reason: %s', $exception->getMessage()));
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
