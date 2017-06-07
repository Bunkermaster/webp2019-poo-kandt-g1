<?php

namespace Bunkermaster\Controller;

use Bunkermaster\Helper\Controller;
use Bunkermaster\Helper\DefaultPageNotFoundException;
use Bunkermaster\Helper\ErrorMessage;
use Bunkermaster\Model\PageModel;
use MongoDB\Driver\Exception\ExecutionTimeoutException;

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
        $data['page'] = $this->model->getDefault();
        $data['nav'] = $this->model->getNav();
        if(false === $data['page']){
            throw new DefaultPageNotFoundException('Page par défaut pas trouvée!', 101);
        }
        // affichage de la page par défaut
        // return render
        return $this->render("page/page-front.php", $data);
    }

    /**
     * front details method
     */
    public function detailsAction()
    {
        $data['page'] = $this->model->getBySlug($this->verificationParamGet('s'));
        $data['nav'] = $this->model->getNav();
        if ($data['page'] === false) {
            header("Location: ./?a=404");
            exit;
        }
        // affichage de la page par défaut
        // return render
        return $this->render("page/page-front.php", $data);
    }

    /**
     * admin home method
     */
    public function adminHomeAction()
    {
        $data['error-block'] = $this->errorBlock(ErrorMessage::getError($_GET['err'] ?? false));
        $data['pages'] = $this->model->getList();
        $data['count-widget'] = $this->nombreDePages();

        return $this->render("page/list.php", $data);
    }

    /**
     * admin details method
     */
    public function adminDetailsAction()
    {

        return $this->render(
            "page/admin-details.php",
            ['data' => $this->model->getById($this->verificationParamGet())]
        );
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
            $data = new \stdClass();
            $data->h1 = '';
            $data->description = '';
            $data->img = '';
            $data->alt = '';
            $data->slug = '';
            $data->{'nav-title'} = '';

            return $this->render("page/add-form.php", $data);
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
            $data = $this->model->getById((int) $this->verificationParamGet('id'));

            return $this->render("page/add-form.php", $data);
        }
    }

    /**
     * admin delete method
     */
    public function adminDeleteAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            if ($this->model->delete($_POST['id']) === true) {
                $this->goHome();
            } else {
                throw new \Exception('Mexican twilight zone (mariachi edition)');
            }
        } else {

            // on affiche la page de suppression avec les données injectées directement
            // depuis le model dans la vue (en passant par un cast pour passer de stdClass à array)
            return $this->render(
                "page/delete-form.php",
                (array) $this->model->getById($_GET['id'] ?? false)
            );
        }
    }

    /**
     * @return string
     */
    public function nombreDePages()
    {
        $count = $this->model->getCount();
        return $this->render("page/widget-count.php", [
            'count' => $count
        ]);
    }

    /**
     * mettre une page en page par defaut
     * @return void
     */
    public function defaultizerAction()
    {
        $this->model->setDefault($this->verificationParamGet('id'));
        $this->goHome('yeah!');
    }
}
