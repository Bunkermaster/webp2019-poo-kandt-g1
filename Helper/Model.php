<?php

namespace Bunkermaster\Helper;

/**
 * Class Model
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Helper
 */
abstract class Model
{
    public function errorManagement(\PDOStatement $stmt, $msg = 'Marche pas!')
    {
        if ($stmt->errorCode() !== '00000') {
            throw new \PDOException(debug_backtrace()[1]['class'].'::'
                .debug_backtrace()[1]['function'].' '.$msg);
        }
    }
}
