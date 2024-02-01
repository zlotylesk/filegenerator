<?php

declare(strict_types=1);

namespace App\Tests\Service\FileGenerator;

use App\Entity\Report;
use App\Service\FileGenerator\Generator;
use PHPUnit\Framework\TestCase;

final class GeneratorTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }

    public static function namesDataProvider(): array
    {
        return [
            ['foo', null, null, 'foo'],
            ['foo', '2024-01-01', null, 'foo'],
            ['foo', null, '2024-01-01', 'foo'],
            ['foo', '2024-01-01', '2024-01-01', 'foo (2024-01-01)'],
            ['foo', '2024-01-01', '2024-01-31', 'foo (2024-01-01 - 2024-01-31)'],
        ];
    }

    /**
     * @dataProvider namesDataProvider
     *
     * @param string $name
     * @param string|null $dateFrom
     * @param string|null $dateTo
     * @param string $expected
     * @return void
     */
    public function testGenerateReportFilename(string $name, ?string $dateFrom, ?string $dateTo, string $expected): void
    {
        $report = new Report($name, $dateFrom, $dateTo);
        $result = (new Generator())->generateReportFilename($report);

        $this->assertSame($expected, $result);
    }
}
