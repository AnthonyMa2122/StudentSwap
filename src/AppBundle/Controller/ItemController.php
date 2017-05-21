<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use AppBundle\Entity\Orders;
use AppBundle\Entity\Posts;
use AppBundle\Form\ItemType;
use AppBundle\Form\PostsType;
use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;

class ItemController extends Controller
{
	
	/**
	 * @Route("/post/{item}", name="post")
	 */
	public function postingAction($item)
	{
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' );
		$items = $repository->find ( $item );
		
		return $this->render ( 'default/posting.html.twig', array (
				'items' => $items 
		) );
	}
	
	/**
	 * @Route("/listings", name="listings")
	 */
	public function listingsAction(Request $request)
	{
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' );
		
		$items = $repository->findAll ();
		return self::listItems ( $items, $request );
	}
	
	/**
	 * @Route("/openOrders", name="openOrders")
	 */
	public function openOrdersAction(Request $request)
	{

		$user = $this->getUser ();
		if (! is_object ( $user ) || ! $user instanceof UserInterface)
		{
			throw new AccessDeniedException ( 'This user does not have access to this section.' );
		}
		
		$user = $user->getId ();
		
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' );
		
		$query = $repository->createQueryBuilder ( 'item' )->where ( 'item.userId = :id' )->setParameter ( 'id', $user )->getQuery ();
		
		$items = $query->getResult ();
		foreach ( $items as $item )
		{
			$item->getImage ()->setUpdatedAt ( date_format ( $item->getImage ()->getUpdatedAt (), 'm-d-Y' ) );
		}
		return $this->render ( 'default/openOrders.html.twig', array (
				'items' => $items 
		) );

	}
	
	/**
	 * @Route("/books", name="books")
	 */
	public function booksAction(Request $request)
	{
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' );
		
		$query = $repository->createQueryBuilder ( 'item' )->where ( 'item.category = :category' )->setParameter ( 'category', 'book' )->getQuery ();
		
		$books = $query->getResult ();
		
		return self::listItems ( $books, $request );

	}
	
	/**
	 * @Route("/clothes", name="clothes")
	 */
	public function clothesAction(Request $request)
	{
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' );
		
		$query = $repository->createQueryBuilder ( 'item' )->where ( 'item.category = :category' )->setParameter ( 'category', 'clothes' )->getQuery ();
		
		$clothes = $query->getResult ();

		return self::listItems ( $clothes, $request );

	}
	
	/**
	 * @Route("/tech", name="tech")
	 */
	public function techAction(Request $request)
	{
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' );
		
		$query = $repository->createQueryBuilder ( 'item' )->where ( 'item.category = :category' )->setParameter ( 'category', 'tech' )->getQuery ();
		
		$techs = $query->getResult ();
		
		return self::listItems ( $techs, $request );

	}
	
	/**
	 * @Route("/service", name="service")
	 */
	public function serviceAction(Request $request)
	{
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' );
		
		$query = $repository->createQueryBuilder ( 'item' )->where ( 'item.category = :category' )->setParameter ( 'category', 'service' )->getQuery ();
		
		$service = $query->getResult ();
		
		return self::listItems ( $service, $request );

	}
	
	/**
	 * @Route("/other", name="other")
	 */
	public function otherAction(Request $request)
	{
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' );
		
		$query = $repository->createQueryBuilder ( 'item' )->where ( 'item.category = :category' )->setParameter ( 'category', 'other' )->getQuery ();
		
		$other = $query->getResult ();
		
		return self::listItems ( $other, $request );

	}
	
	/**
	 * @Route("/search", name="search")
	 */
	public function searchAction(Request $request)
	{
		// get items from items table
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' );
		
		$searchTerm = $_GET ['searchTerm'];
		$category = $_GET ['categoryFilter'];
		
		// $search = $repository->createQueryBuilder('item')
		// ->where('item.title LIKE :title')
		// ->setParameter('title', '%'.$searchTerm.'%')
		// ->getQuery()
		// ->getResult();
		
		$search = $repository->createQueryBuilder ( 'item' );
		
		if ($searchTerm == null && $category == 'all')
		{
			$search = $this->getDoctrine ()->getRepository ( 'AppBundle:Item' )->findAll ();
		}
		else if ($searchTerm != null && $category == 'all')
		{
			$search = $repository->createQueryBuilder ( 'item' )
					->where ( 'item.title LIKE :searchTerm' )
					->setParameter ( 'searchTerm', "%" . $searchTerm . "%")
					->getQuery ()->getResult ();
		}
		else if ($searchTerm == null && $category != null)
		{
			// Run query to find that is matching with given category field
			$search = $repository->createQueryBuilder ( 'item' )
					->where ( 'item.category = :category' )
					->setParameter ( 'category', $category )
					->getQuery ()->getResult ();
			// if search category is 'All' or is not defined and search term is defined
		}
		else
		{
			$search = $repository->createQueryBuilder ( 'item' )
					->where ( 'item.category = :category' )
					->andwhere ( 'item.title LIKE :searchTerm' )
					->setParameter ( 'category', $category )
					->setParameter ( 'searchTerm', "%" . $searchTerm . "%" )
					->getQuery ()->getResult ();
		}

		if($search == null)
        {
            $search = $repository->createQueryBuilder ( 'item' )
                    ->getQuery ()->getResult ();
        }
		return self::listItems ( $search, $request );
	}
	
	public function listItems($items, $request)
	{
		$posts = new Posts ();
		foreach ( $items as $item )
		{
			$posts->getItem ()->add ( $item );
		}
		
		$form = $this->createForm ( PostsType::Class, $posts );
		$form->handleRequest ( $request );
		
		if ($form->isSubmitted () && $form->isValid ())
		{
			
			$user = $this->getUser();
			if (!is_object($user) || !$user instanceof UserInterface) 
			{
					throw new AccessDeniedException('This user does not have access to this section.');
			}

			$order = new Orders();
			$em = $this->getDoctrine()->getManager();
			$returned = $form->getData ()->getItem ();
			$find;
			$found = false;
			$compare;
			foreach ($items as $it)
			{
				$userId = $user->getId();
				foreach ($returned as $re)
				{
					$compare = $re->getId();
					if ($found == false && $request->request->get($compare) !== null && $compare === $it->getId()) 
					{
						$find = $it;
						$found = true;
					}
				}
			}

			$findUser = $this->getDoctrine ()->getRepository ( 'AppBundle:User' )->find ( $this->getUser()->getId());

			if ($find !== null)
			{
				$order->setUser($findUser->getId());
				$order->setItem($find);
				$order->setCount(0);
				$em->persist($order);
			}

			try
			{
				$em->flush ();
			} 
			catch (\Exception $e)
			{
				return $this->render ( 'default/listings.html.twig', array (
						'items' => $items,
						'forms' => $form->createView () ) 
				);
			}
			
			try
			{
				$findUser = $this->getDoctrine ()->getRepository ( 'AppBundle:User' )->find ( $find->getUserId());
				$txt = new TextController ();
				$txt->textAction('1'.$findUser->getPhoneNumber(),'Hello, someone is interesting in your product.');
			}
			catch (\Exception $e)
			{
			}

			return $this->render ( 'default/home.html.twig' );
		}
		
		return $this->render ( 'default/listings.html.twig', array (
				'items' => $items,
				'forms' => $form->createView () 
		) );
	}

}
