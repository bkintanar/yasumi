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

namespace Yasumi\tests\Croatia;

use DateTime;
use DateTimeZone;
use Exception;
use Yasumi\Holiday;
use Yasumi\tests\HolidayTestCase;

/**
 * Class containing tests for Easter in Croatia.
 */
class EasterTest extends CroatiaBaseTestCase implements HolidayTestCase
{
    /**
     * The name of the holiday to be tested.
     */
    public const HOLIDAY = 'easter';

    /**
     * Tests the holiday defined in this test.
     *
     * @throws Exception
     */
    public function testHoliday(): void
    {
        $year = 1677;
        $this->assertHoliday(
            self::REGION,
            self::HOLIDAY,
            $year,
            new DateTime("$year-4-15", new DateTimeZone(self::TIMEZONE))
        );
    }

    /**
     * Tests translated name of the holiday defined in this test.
     *
     * @throws Exception
     */
    public function testTranslation(): void
    {
        $this->assertTranslatedHolidayName(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(),
            [self::LOCALE => 'Uskrs']
        );
    }

    /**
     * Tests type of the holiday defined in this test.
     *
     * @throws Exception
     */
    public function testHolidayType(): void
    {
        $this->assertHolidayType(self::REGION, self::HOLIDAY, $this->generateRandomYear(), Holiday::TYPE_OFFICIAL);
    }
}
