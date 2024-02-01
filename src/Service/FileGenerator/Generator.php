<?php

namespace App\Service\FileGenerator;

use App\Entity\Report;

class Generator
{
    private FileGeneratorInterface $fileGenerator;

    public function setFileGenerator(FileGeneratorInterface $fileGenerator): self
    {
        $this->fileGenerator = $fileGenerator;

        return $this;
    }

    public function generateFile(Report $report, array $headers, array $data): void
    {
        $filename = $this->generateReportFilename($report);

        $this->fileGenerator->generate($filename, $headers, $data);
    }

    public function generateReportFilename(Report $report): string
    {
        $filename = $report->getName();
        $dateStart = $report->getDateFrom();
        $dateEnd = $report->getDateTo();

        $format = $dateStart && $dateEnd
            ? $dateStart === $dateEnd
                ? '%s (%s)'
                : '%s (%s - %s)'
            : '%s';

        return sprintf($format, $filename, $dateStart, $dateEnd);
    }
}
