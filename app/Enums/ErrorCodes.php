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
    const USR_02 = "USR_02";// The field(s) are/is required
    const USR_03 = "USR_03";// The email is invalid
    const USR_04 = "USR_04";// The email already exists
    const USR_05 = "USR_05";// email doesnt exist
    const USR_06 = "USR_06";// this is an invalid phone number
    const USR_07 = "USR_07";// value too long
    const USR_08 = "USR_08";// this is an invalid phone number
    const USR_09 = "USR_09";// The Shipping Region ID is not number
}
