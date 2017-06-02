<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 02/06/2017
 * Time: 11:34
 */

$a = [
    "toto" => "tata"
];
var_dump((object) $a);

/*
/.../reference/demo/demo-stdclass.php:12:
class stdClass#1 (1) {
  public $toto =>
  string(4) "tata"
}
 */
