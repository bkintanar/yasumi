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

namespace Yasumi\tests\Japan;

use DateTime;
use DateTimeZone;
use Exception;
use Yasumi\Holiday;
use Yasumi\tests\HolidayTestCase;

/**
 * Class for testing Marine Day in Japan.
 */
class MarineDayTest extends JapanBaseTestCase implements HolidayTestCase
{
    /**
     * The name of the holiday.
     */
    public const HOLIDAY = 'marineDay';

    /**
     * The year in which the holiday was first established.
     */
    public const ESTABLISHMENT_YEAR = 1996;

    /**
     * Tests Marine Day in 2021. Marine Day in 2021 is July 22th for rescheduled Olympic Games after COVID-19.
     *
     * @throws Exception
     */
    public function testMarineDayIn2021(): void
    {
        $year = 2021;
        $this->assertHoliday(
            self::REGION,
            self::HOLIDAY,
            $year,
            new DateTime("$year-7-22", new DateTimeZone(self::TIMEZONE))
        );
    }

    /**
     * Tests Marine Day after 2003. Marine Day was established since 1996 on July 20th. After 2003 it was changed
     * to be the third monday of July.
     *
     * @throws Exception
     */
    public function testMarineDayOnAfter2003(): void
    {
        $year = $this->generateRandomYear(2004);

        if (2021 === $year) {
            $this->testMarineDayIn2021();
        }

        $this->assertHoliday(
            self::REGION,
            self::HOLIDAY,
            $year,
            new DateTime("third monday of july $year", new DateTimeZone(self::TIMEZONE))
        );
    }

    /**
     * Tests Marine Day between 1996 and 2003. Marine Day was established since 1996 on July 20th. After 2003 it was
     * changed to be the third monday of July.
     *
     * @throws Exception
     */
    public function testMarineDayBetween1996And2003(): void
    {
        $year = 2001;
        $this->assertHoliday(
            self::REGION,
            self::HOLIDAY,
            $year,
            new DateTime("$year-7-20", new DateTimeZone(self::TIMEZONE))
        );
    }

    /**
     * Tests Marine Day between 1996 and 2003 substituted next working day (when Marine Day falls on a Sunday).
     *
     * @throws Exception
     */
    public function testMarineDayBetween1996And2003SubstitutedNextWorkingDay(): void
    {
        $year = 1997;
        $this->assertHoliday(
            self::REGION,
            self::SUBSTITUTE_PREFIX.self::HOLIDAY,
            $year,
            new DateTime("$year-7-21", new DateTimeZone(self::TIMEZONE))
        );
    }

    /**
     * Tests Marine Day before 1996. Marine Day was established since 1996 on July 20th. After 2003 it was changed
     * to be the third monday of July.
     *
     * @throws Exception
     */
    public function testMarineDayBefore1996(): void
    {
        $this->assertNotHoliday(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(1000, self::ESTABLISHMENT_YEAR - 1)
        );
    }

    /**
     * Tests the translated name of the holiday defined in this test.
     *
     * @throws Exception
     */
    public function testTranslation(): void
    {
        $this->assertTranslatedHolidayName(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(self::ESTABLISHMENT_YEAR),
            [self::LOCALE => '海の日']
        );
    }

    /**
     * Tests type of the holiday defined in this test.
     *
     * @throws Exception
     */
    public function testHolidayType(): void
    {
        $this->assertHolidayType(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(self::ESTABLISHMENT_YEAR),
            Holiday::TYPE_OFFICIAL
        );
    }
}
