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
        return $data;
    }

    /**
     * front details method
     */
    public function detailsAction()
    {
        $data = $this->model->getBySlug('les-chatons-wesh-grosdsfdsfg');
        return $data;
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
