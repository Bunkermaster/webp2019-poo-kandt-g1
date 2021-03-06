<?php

namespace Bunkermaster\Helper;

/**
 * Class Controller
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Helper
 */
abstract class Controller
{
    /**
     * Cette fonction permet de générer les pages à travers le "templating" natif
     * @param string $fileName
     * @param array $data
     * @return string
     */
    public function render($fileName, $data = [])
    {
        if (!file_exists(APP_DIR_VIEW.$fileName)) {
            // le chemin de la vue ne correspond pas à un fichier existant
            throw new \InvalidArgumentException('Fichier de vue '.$fileName.' non trouvé');
        }
        ob_start();
        require APP_DIR_VIEW.$fileName;
        return ob_get_clean();
    }

    /**
     * @param $data
     * @param $validation
     * @return bool
     */
    public function validationChamps($data, $validation)
    {
        if(
            !is_array($data)
            || !is_array($validation)
            || count($data) < count($validation)
        ){

            return false;
        }
        foreach ($validation as $check) {
            if(!isset($data[$check])){

                return false;
            }
        }

        return true;
    }

    public function errorBlock($msg)
    {
        if ($msg !== false) {

            return $this->render('page/error-block.php', $msg);
        } else {

            return '';
        }
    }

    public function verificationParamGet($param = 'id')
    {
        if (!isset($_GET[$param]) || trim($_GET[$param]) === '') {
            header("Location: ./?a=400");
            exit;
        }

        return $_GET[$param];
    }

    public function goHome($msg = false)
    {
        $msgParam = '';
        if(false !== $msg){
            $msgParam = '&err='.$msg;
        }
        header('Location: ./?a=admin'.$msgParam);
        exit;
    }
}
