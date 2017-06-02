<?php

namespace Bunkermaster\Controller;

use Bunkermaster\Helper\Controller;
use Bunkermaster\Helper\DefaultPageNotFoundException;
use Bunkermaster\Model\PageModel;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Yann\Controller
 */
class PageController extends Controller
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
        return $this->render("page/page-front.php", $data);
//        ob_start();
//        require APP_DIR_VIEW."page/page-front.php";
//        return ob_get_clean();
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
     * admin home method
     */
    public function adminHomeAction()
    {
        $data = $this->model->getList();
        ob_start();
        require APP_DIR_VIEW."page/list.php";

        return ob_get_clean();
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->add($_POST) === true) {
                header('Location: ./?a=admin');
            } else {
                throw new \Exception('4eme dimension');
            }
        } else {
            ob_start();
            $data = new \stdClass();
            $data->h1 = '';
            $data->description = '';
            $data->img = '';
            $data->alt = '';
            $data->slug = '';
            $data->{'nav-title'} = '';
            require APP_DIR_VIEW."page/add-form.php";

            return ob_get_clean();
        }
    }

    /**
     * admin edit method
     */
    public function adminEditAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->update($_POST) === true) {
                header('Location: ./?a=admin');
            } else {
                throw new \Exception('4eme dimension');
            }
        } else {
            if (!isset($_GET['id']) || trim($_GET['id']) === '') {
                header("Location: ./?a=400");
                exit;
            }
            $data = $this->model->getById((int) $_GET['id']);

            return $this->render("page/add-form.php", $data);
        }
    }

    /**
     * admin delete method
     */
    public function adminDeleteAction()
    {

    }
}
