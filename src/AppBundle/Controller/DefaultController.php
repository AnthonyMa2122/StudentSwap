<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        return $this->render('default/index.html.twig');
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

    /**
     * @Route("/prototype")
     */
    public function prototypeAction()
    {

        $repository = $this->getDoctrine()->getRepository('AppBundle:Item');
        
        $item = $repository->findAll();
        $item = $repository->find(1);

        return $this->render('default/prototype.html.twig', array('item' => $item));
    }
}

