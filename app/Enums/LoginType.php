<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LoginType extends Enum
{
    const APP_DEFAULT =   "app_default";
    const FACEBOOK =   "facebook";
}
