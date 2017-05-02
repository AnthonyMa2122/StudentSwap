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
    public function booksAction(Request $request)
    {

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Item');

        $query = $repository->createQueryBuilder('b')
            ->where('b.category = book')
            ->getQuery();

        $books = $query->getResult();


        return $this->render('default/books.html.twig', array('books' => $books));
    }
}
