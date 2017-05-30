<?php

namespace Bunkermaster\Controller;

/**
 * Class ErrorController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Controller
 */
class ErrorController
{
    public static function error404Action()
    {
        return self::errorGenerator(404, 'Pas trouvé, c\'te honte!');
    }

    public static function error400Action()
    {
        return self::errorGenerator(400, 'Bad request!');
    }

    public static function error500Action($message = 'Arrrghhhh X_x')
    {
        return self::errorGenerator(500, $message);
    }

    private static function errorGenerator($code, $message)
    {
        http_response_code($code);
        return $message;
    }
}