<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 24/05/2017
 * Time: 10:06
 */
require_once "vendor/autoload.php";
$controller = new \Bunkermaster\Controller\PageController();
$output = $controller->detailsAction();
dump($output);
