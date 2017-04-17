<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ItemController extends Controller
{

    /**
     * @Route("/listings", name="listings")
     */
    public function listingsAction()
    {

        $items = $this->getDoctrine()
            ->getRepository('AppBundle:Item')
            ->findAll();

        return $this->render('default/listing.html.twig', array('items' => $items));
    }

/*
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
    }*/
}
