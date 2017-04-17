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
     * @Route("/openOrders", name="openOrders")
     */
    public function openOrdersAction()
    {
        // replace this example code with whatever you need.
        return $this->render('default/openOrders.html.twig');
    }

    /**
     * @Route("/books", name="books")
     */
    public function booksAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/books.html.twig');
    }

    /**
     * @Route("/clothes", name="clothes")
     */
    public function clothesAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/clothes.html.twig');
    }

    /**
     * @Route("/tech", name="tech")
     */
    public function techAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/tech.html.twig');
    }

    /**
     * @Route("/booksLoggedIn", name="booksLoggedIn")
     */
    public function booksLoggedInAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/booksLoggedIn.html.twig');
    }

    /**
     * @Route("/clothesLoggedIn", name="clothesLoggedIn")
     */
    public function clothesLoggedInAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/clothesLoggedIn.html.twig');
    }

    /**
     * @Route("/techLoggedIn", name="techLoggedIn")
     */
    public function techLoggedInAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/techLoggedIn.html.twig');
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
     * @Route("/listings", name="listings")
     */
    public function listingsAction()
    {
        return $this->render('default/listing.html.twig');
    }

    /**
     * @Route("/prototype")
     */
    public function prototypeAction(Request $request)
    {
        $item = new Item();

        //Creates the form
        $form = $this->createFormBuilder($item)
            ->add('id', IntegerType::class, array('mapped' => false))
            ->add('search', SubmitType::class, array('label' => 'Search Item'))
            ->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            // $form->getData() holds the submitted values
            $id = $form['id']->getData();

            $item = $this->getDoctrine()
                ->getRepository('AppBundle:Item')
                ->find($id);

            //Handles bounds. Not Completed. Needs validation or better handling action
            if (!$item) {
                throw $this->createNotFoundException(
                    'No item found for id ' . $id);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->render('default/prototype.html.twig',
                array('form' => $form->createView(), 'item' => $item));
        }

        return $this->render('default/prototype.html.twig',
            array('form' => $form->createView(), 'item' => $item));
    }
}

