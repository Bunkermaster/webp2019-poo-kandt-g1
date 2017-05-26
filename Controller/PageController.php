<?php

namespace Bunkermaster\Controller;

use Bunkermaster\Model\PageModel;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Yann\Controller
 */
class PageController
{
    /** @var PageModel $model */
    private $model;
    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->model = new PageModel();
    }

    /**
     * front home method
     */
    public function homeAction()
    {
        // récuperation des données de la page par défaut
        $data = $this->model->getDefault();
        // affichage de la page par défaut
        // return render
        ob_start();
        require APP_DIR_VIEW."page-front.php";
        return ob_get_clean();
    }

    /**
     * front details method
     */
    public function detailsAction()
    {
        if (!isset($_GET['s']) || trim($_GET['s']) === '') {
            header("Location: ./");
            exit;
        }
        $slug = $_GET['s'];
        $data = $this->model->getBySlug($slug);
        if ($data === false) {
            http_response_code(404);
            die('Pas de page');
        }
        // affichage de la page par défaut
        // return render
        ob_start();
        require APP_DIR_VIEW."page-front.php";
        return ob_get_clean();

    }

    /**
     * front 404 method
     */
    public function fourOFourAction()
    {
        // pas de model
    }

    /**
     * admin home method
     */
    public function adminHomeAction()
    {
        $data = $this->model->getList();
    }

    /**
     * admin details method
     */
    public function adminDetailsAction()
    {
        $this->model->getById($_GET['id'] ?? false );
    }

    /**
     * admin add method
     */
    public function adminAddAction()
    {

    }

    /**
     * admin edit method
     */
    public function adminEditAction()
    {

    }

    /**
     * admin delete method
     */
    public function adminDeleteAction()
    {

    }
}
