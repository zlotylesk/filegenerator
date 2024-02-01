<?php

declare(strict_types=1);

namespace App\Entity;

final class Report
{
    public function __construct(
        readonly private string $name,
        readonly private ?string $dateFrom,
        readonly private ?string $dateTo
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDateFrom(): ?string
    {
        return $this->dateFrom;
    }

    public function getDateTo(): ?string
    {
        return $this->dateTo;
    }
}
