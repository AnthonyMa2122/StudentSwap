<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Item;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/home.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/login.html.twig');
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/register.html.twig');
    }

    /**
     * @Route("/homeLoggedIn", name="homeLoggedIn")
     */
    public function homeLoggedInAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/homeLoggedIn.html.twig');
    }

    /**
     * @Route("/terms", name="terms")
     */
    public function termsAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/terms.html.twig');
    }

    /**
     * @Route("/disclaimer", name="disclaimer")
     */
    public function disclaimerAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/disclaimer.html.twig');
    }

    /**
     * @Route("/infoPrivacy", name="infoPrivacy")
     */
    public function infoPrivacyAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/infoPrivacy.html.twig');
    }

    /**
     * @Route("/createPost", name="createPost")
     */
    public function createPostAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/createPost.html.twig');
    }


    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboardAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/dashboard.html.twig');
    }

    /**
     * @Route("/greg", name="greg")
     */
    public function gregAction()
    {
        return $this->render('default/aboutgreg.html.twig');
    }

    /**
     * @Route("/alex", name="alex")
     */
    public function alexAction()
    {
        return $this->render('default/aboutalex.html.twig');
    }

    /**
     * @Route("/anthony", name="anthony")
     */
    public function anthonyAction()
    {
        return $this->render('default/aboutanthony.html.twig');
    }

    /**
     * @Route("/robin", name="robin")
     */
    public function robinAction()
    {
        return $this->render('default/aboutrobin.html.twig');
    }

    /**
     * @Route("/avery", name="avery")
     */
    public function averyAction()
    {
        return $this->render('default/aboutavery.html.twig');
    }

    /**
     * @Route("/leanna", name="leanna")
     */
    public function leanneAction()
    {
        return $this->render('default/aboutleanna.html.twig');
    }

    /**
     * @Route("/elric", name="elric")
     */
    public function elricAction()
    {
        return $this->render('default/aboutelric.html.twig');
    }
}

