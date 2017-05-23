<?php

namespace Yann\Controller;

use Yann\Model\PageModel;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Yann\Controller
 */
class PageController
{
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
        $data = $this->model->getDefault();
    }

    /**
     * front details method
     */
    public function detailsAction()
    {
        $data = $this->model->getBySlug($_GET['slug'] ?? null);
    }

    /**
     * front 404 method
     */
    public function fourOFourAction()
    {
        
    }

    /**
     * admin home method
     */
    public function adminHomeAction()
    {
        
    }

    /**
     * admin details method
     */
    public function adminDetailsAction()
    {
        
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
