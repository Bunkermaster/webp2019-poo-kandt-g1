<?php

namespace Bunkermaster\Controller;

use Bunkermaster\Helper\DefaultPageNotFoundException;
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
        if(false === $data){
            throw new DefaultPageNotFoundException('Page par défaut pas trouvée!', 101);
        }
        // affichage de la page par défaut
        // return render
        ob_start();
        require APP_DIR_VIEW."page/page-front.php";
        return ob_get_clean();
    }

    /**
     * front details method
     */
    public function detailsAction()
    {
        if (!isset($_GET['s']) || trim($_GET['s']) === '') {
            header("Location: ./?a=400");
            exit;
        }
        $slug = $_GET['s'];
        $data = $this->model->getBySlug($slug);
        if ($data === false) {
            header("Location: ./?a=404");
            exit;
        }
        // affichage de la page par défaut
        // return render
        ob_start();
        require APP_DIR_VIEW."page/page-front.php";

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
        return var_export($this->model->getList(),1);
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
