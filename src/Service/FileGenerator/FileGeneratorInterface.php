<?php

declare(strict_types=1);

namespace App\Service\FileGenerator;

interface FileGeneratorInterface
{
    public function generate(string $filename, array $headers, array $data): void;
}
