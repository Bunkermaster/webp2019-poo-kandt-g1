<?php

namespace Bunkermaster\Helper;

use Bunkermaster\Controller\ErrorController;
use Bunkermaster\Controller\PageController;
use MongoDB\Driver\Exception\ExecutionTimeoutException;

/**
 * Class FrontController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Helper
 */
class FrontController
{
    public static function appStart()
    {
        $output = '';
        try {
            $action = $_GET['a'] ?? $_POST['a'] ?? '';
            switch($action){
                case 'details':
                    $controller = new PageController();
                    $output = $controller->detailsAction();
                    break;

                case 'admin':
                case 'admin/':
                    $controller = new PageController();
                    $output = $controller->adminHomeAction();
                    break;

                case '404':
                    $output = ErrorController::error404Action();
                    break;

                case '400':
                    $output = ErrorController::error400Action();
                    break;

                case 'home':
                default:
                    $controller = new PageController();
                    $output = $controller->homeAction();
                    break;
            }
        } catch(DefaultPageNotFoundException $e){
            // gestion
            $output = ErrorController::error500Action();
        } catch(\PDOException $e){
            // gestion exception
            $output = ErrorController::error500Action("Probleme de DB!");
        } catch( \Twig_Error $e){
            // gestion exception
        } catch( \Exception $e){
            // gestion exception
            $output = $e->getMessage();
        }
//        header('Content-Type: application/json');
        echo $output;
    }
}