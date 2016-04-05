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

    function homeAction()
    {
        return $this->render('partials/home.html.twig');
    }

    function aboutUsAction()
    {
        return $this->render('partials/about-us.html.twig');
    }

    function openingAction()
    {
        return $this->render('partials/opening.html.twig');
    }

    function menuAction()
    {
        return $this->render('partials/menu.html.twig');
    }

    function galerieAction()
    {
        return $this->render('partials/galerie.html.twig');
    }

    function bookingAction()
    {
        return $this->render('partials/booking.html.twig');
    }

    function testimonyAction()
    {
        return $this->render('partials/testimonials.html.twig');
    }

    function contactAction()
    {
        return $this->render('partials/contact.html.twig');
    }

    function footerAction()
    {
        return $this->render('partials/footer.html.twig');
    }
}