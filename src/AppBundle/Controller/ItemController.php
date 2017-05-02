<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ItemController extends Controller
{
    /**
     * @Route("/books", name="books")
     */
    public function booksAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Item');

        $query = $repository->createQueryBuilder('item')
            ->where('item.category = :category')
            ->setParameter('category', 'book')
            ->getQuery();

        $books = $query->getResult();

        return $this->render('default/books.html.twig', array('books' => $books));
    }


    /**
     * @Route("/clothes", name="clothes")
     */
    public function clothesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Item');

        $query = $repository->createQueryBuilder('item')
            ->where('item.category = :category')
            ->setParameter('category', 'clothes')
            ->getQuery();

        $clothes= $query->getResult();

        return $this->render('default/clothes.html.twig', array('clothes' => $clothes));
    }

    /**
     * @Route("/tech", name="tech")
     */
    public function techAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Item');

        $query = $repository->createQueryBuilder('item')
            ->where('item.category = :category')
            ->setParameter('category', 'tech')
            ->getQuery();

        $techs= $query->getResult();

        return $this->render('default/tech.html.twig', array('techs' => $techs));
    }

}