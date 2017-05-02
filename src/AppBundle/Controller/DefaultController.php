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


    /**
     * @Route("/openOrders", name="openOrders")
     */
    public function openOrdersAction()
    {
        $user = $this->getUser()->getId();

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Item');

        $query = $repository->createQueryBuilder('item')
            ->where('item.userId = :id')
            ->setParameter('id', $user)
            ->getQuery();

        $items = $query->getResult();

        return $this->render('default/openOrders.html.twig', array('items' => $items));
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

