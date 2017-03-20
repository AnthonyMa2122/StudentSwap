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
     * @Route("/prototype" , name="search")
     */
    public function prototypeAction(Request $request)
    {
	$item =  new Item();

	$form = $this->createFormBuilder($item)
		->add('id', IntegerType::class, array('mapped' => false))
		->add('search', SubmitType::class, array('label' => 'Search Item'))
		->getForm();
	$form->handleRequest($request);

	if ($form->isSubmitted() && $form->isValid()) {
		$key = $form['id']->getData();

		$item = $this->getDoctrine()
			->getRepository('AppBundle:Item')
                	->find($key);
		
		$em = $this->getDoctrine()->getManager();
	        $em->persist($item);
       		$em->flush();

		return $this->render('default/prototype.html.twig', array('form' => $form->createView(), 'item' => $item));
		//return $this->redirectToRoute('search');
	}
/*	
        $item = $this->getDoctrine()
		->getRepository('AppBundle:Item')
		->find(1);
*/
        return $this->render('default/prototype.html.twig', array('form' => $form->createView(), 'item' => $item));
    }
}

