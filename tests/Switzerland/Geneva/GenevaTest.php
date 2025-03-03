<?php

declare(strict_types=1);
/*
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2022 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me at sachatelgenhof dot com>
 */

namespace Yasumi\tests\Switzerland\Geneva;

use ReflectionException;
use Yasumi\Holiday;
use Yasumi\tests\ProviderTestCase;

/**
 * Class for testing holidays in Geneva (Switzerland).
 */
class GenevaTest extends GenevaBaseTestCase implements ProviderTestCase
{
    /**
     * @var int year random year number used for all tests in this Test Case
     */
    protected int $year;

    /**
     * Initial setup of this Test Case.
     *
     * @throws \Exception
     */
    protected function setUp(): void
    {
        $this->year = $this->generateRandomYear(1945);
    }

    /**
     * Tests if all official holidays in Geneva (Switzerland) are defined by the provider class.
     */
    public function testOfficialHolidays(): void
    {
        $officialHolidays = [];
        if ($this->year >= 1994) {
            $officialHolidays[] = 'swissNationalDay';
        }
        $this->assertDefinedHolidays($officialHolidays, self::REGION, $this->year, Holiday::TYPE_OFFICIAL);
    }

    /**
     * Tests if all regional holidays in Geneva (Switzerland) are defined by the provider class.
     */
    public function testRegionalHolidays(): void
    {
        $regionalHolidays = [
            'goodFriday',
            'newYearsDay',
            'christmasDay',
            'ascensionDay',
            'easterMonday',
            'pentecostMonday',
        ];

        if ($this->year > 1813) {
            $regionalHolidays[] = 'restaurationGenevoise';
        }

        $this->assertDefinedHolidays($regionalHolidays, self::REGION, $this->year, Holiday::TYPE_OTHER);
    }

    /**
     * Tests if all observed holidays in Geneva (Switzerland) are defined by the provider class.
     */
    public function testObservedHolidays(): void
    {
        $observedHolidays = [];
        if (($this->year >= 1899 && $this->year < 1994) || 1891 === $this->year) {
            $observedHolidays[] = 'swissNationalDay';
        }

        if ($this->year > 1869 && $this->year < 1966) {
            $observedHolidays[] = 'jeuneGenevois';
        }

        $this->assertDefinedHolidays($observedHolidays, self::REGION, $this->year, Holiday::TYPE_OBSERVANCE);
    }

    /**
     * Tests if all seasonal holidays in Geneva (Switzerland) are defined by the provider class.
     */
    public function testSeasonalHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_SEASON);
    }

    /**
     * Tests if all bank holidays in Geneva (Switzerland) are defined by the provider class.
     */
    public function testBankHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_BANK);
    }

    /**
     * Tests if all other holidays in Geneva (Switzerland) are defined by the provider class.
     */
    public function testOtherHolidays(): void
    {
        $otherHolidays = [];
        if (($this->year >= 1840 && $this->year <= 1869) || $this->year >= 1966) {
            $otherHolidays[] = 'jeuneGenevois';
        }

        $this->assertDefinedHolidays($otherHolidays, self::REGION, $this->year, Holiday::TYPE_OTHER);
    }

    /**
     * @throws ReflectionException
     * @throws \Exception
     */
    public function testSources(): void
    {
        $this->assertSources(self::REGION, 3);
    }
}
