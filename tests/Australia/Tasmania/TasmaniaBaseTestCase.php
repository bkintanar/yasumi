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

namespace Yasumi\tests\Australia\Tasmania;

use Yasumi\tests\Australia\AustraliaBaseTestCase;
use Yasumi\tests\YasumiBase;

/**
 * Base class for test cases of the Victoria holiday provider.
 */
abstract class TasmaniaBaseTestCase extends AustraliaBaseTestCase
{
    use YasumiBase;

    /** Name of the region (e.g. country / state) to be tested. */
    public string $region = 'Australia\Tasmania';

    /** Timezone in which this provider has holidays defined. */
    public string $timezone = 'Australia/Tasmania';
}
