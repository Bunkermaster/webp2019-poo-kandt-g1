<?php

namespace Bunkermaster\Helper;

/**
 * Class ErrorMessage
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Helper
 */
class ErrorMessage
{
    const ERROR_CONF_FILE = APP_DIR_ROOT."errors.json";
    const ERROR_DEFAULT_MSG = '0000';

    /**
     * @param string $code
     * @return bool|array
     */
    public static function getError($code)
    {
        $errorTable = json_decode(file_get_contents(self::ERROR_CONF_FILE),true);
        if ($code === false) {

            return false;
        }
        if (isset($errorTable[$code])) {

            return $errorTable[$code];
        } else {

            return $errorTable[self::ERROR_DEFAULT_MSG];
        }
    }
}