<?php

declare(strict_types=1);

namespace App\Service\FileGenerator\Generator;

use App\Service\FileGenerator\FileGeneratorInterface;
use App\Service\FileGenerator\Generator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

final class XlsGenerator implements FileGeneratorInterface
{
    private const FILE_EXTENSION = 'xlsx';

    public function generate(string $filename, array $headers, array $data): void
    {
        $spreadsheet = new Spreadsheet();

        $activeWorksheet = $spreadsheet->getActiveSheet();

        if ($headers) {
            $activeWorksheet->fromArray($headers);
        }

        $activeWorksheet->fromArray($data, null, $headers ? 'A2': 'A1');

        $filepath = sprintf('%s/%s.%s', Generator::DOCUMENT_DIR, $filename, self::FILE_EXTENSION);
        $writer = new Xlsx($spreadsheet);
        $writer->save($filepath);
    }
}
