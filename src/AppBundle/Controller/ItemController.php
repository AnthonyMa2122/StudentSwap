<?php

namespace AppBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ItemController extends Controller
{

    /**
     * @Route("/listings", name="listings")
     */
    public function listingsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Item');

        $items = $repository->findAll();

        return $this->render('default/listings.html.twig',array('items' => $items));
    }

    /**
     * @Route("/openOrders", name="openOrders")
     */
    public function openOrdersAction()
    {

        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $user = $user->getId();

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

    /**
     * @Route("/search", name="search")
     */
    public function searchAction()
    {
        
        //get items from items table
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Item');

        $searchTerm = 'gone';

        $search = $repository->createQueryBuilder('item')
            ->where('item.title LIKE :title')
            ->setParameter('title', '%'.$searchTerm.'%')
            ->getQuery()
            ->getResult();

        return $this->render('default/search.html.twig', array('search' => $search));
    }

}