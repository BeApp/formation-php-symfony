<?php

namespace App\Tests\Utils;

use App\Utils\DateUtils;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertThat;

class DateUtilsTest extends TestCase
{
    public function testFormatDate_en()
    {
        $this->assertEquals('', DateUtils::formatDate(null, 'en'));
        $this->assertEquals('The 13 September at 03h05pm', DateUtils::formatDate(new \DateTimeImmutable('2023-09-13T15:05:23+0200'), 'en'));
    }

    public function testFormatDate_fr()
    {
        $this->assertEquals('', DateUtils::formatDate(null, 'fr'));
        $this->assertEquals('Le 13 Septembre à 15:05', DateUtils::formatDate(new \DateTimeImmutable('2023-09-13T15:05:23+0200'), 'fr'));
    }

}
