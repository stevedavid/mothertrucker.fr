<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
    /**
     * @Route("/", name="front_index")
     */
    public function indexAction()
    {
        return $this->render('index.html.twig');
    }

    function headerAction()
    {
        return $this->render('partials/header.html.twig');
    }

    function aboutUsAction()
    {
        return $this->render('partials/about-us.html.twig');
    }
}