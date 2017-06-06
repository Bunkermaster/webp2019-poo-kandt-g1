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

                case 'admin/add':
                    $controller = new PageController();
                    $output = $controller->adminAddAction();
                    break;

                case 'admin/edit':
                    $controller = new PageController();
                    $output = $controller->adminEditAction();
                    break;

                case 'admin/delete':
                    $controller = new PageController();
                    $output = $controller->adminDeleteAction();
                    break;

                case '404':
                    $output = ErrorController::error404Action();
                    break;

                case '400':
                    $output = ErrorController::error400Action();
                    break;

                case 'home':
                case '':
                case '/':
                    $controller = new PageController();
                    $output = $controller->homeAction();
                    break;

                default:
                    header("Location: ./?a=404");
                    exit;
            }
        } catch(DefaultPageNotFoundException $e){
            // gestion
            $output = ErrorController::error500Action();
        } catch(\PDOException $e){
            // gestion exception
            $output = ErrorController::error500Action("Probleme de DB!").$e->getMessage();
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