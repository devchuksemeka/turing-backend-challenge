<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ErrorCodes extends Enum
{
    const DEP_01 =   "DEP_01";
    const DEP_02 =   "DEP_02";
    const CAT_01 =   "CAT_01";
    const ATTR_01 =   "ATTR_01";

    const PRO_01 =   "PRO_01";

    // AUTH ERRORS
    const AUT_01 = "AUT_01"; // Authorization code is empty
    const AUT_02 = "AUT_02"; // Access Unauthorized

    // USERS ERRORS
    const USR_01 = "USR_01";// Email or password is invalid
    const USR_03 = "USR_03";// The email is invalid
    const USR_05 = "USR_05";// email doesnt exist
}
