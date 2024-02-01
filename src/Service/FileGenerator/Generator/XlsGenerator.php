<?php

declare(strict_types=1);

namespace App\Service\FileGenerator\Generator;

use App\Service\FileGenerator\FileGeneratorInterface;

final class XlsGenerator implements FileGeneratorInterface
{
    private const FILE_EXTENSION = 'xlsx';

    public function generate(string $filename, array $headers, array $data): void
    {
        // TODO: Implement generate() method.
    }
}
