<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Images;
use AppBundle\Form\ImagesType;
use Vich\UploaderBundle\Naming\NamerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UploadController extends Controller 
{
	
	/**
	 * @Route("/uploader", name="uploader")
	 */
	public function newAction2(Request $request) 
	{
		$images = new Images ();
		$form = $this->createForm ( ImagesType::class, $images );
		$form->handleRequest ( $request );
		
		if ($form->isSubmitted () && $form->isValid ()) 
		{
			$file = $images->getImageFile ();
			
			$em = $this->getDoctrine ()->getManager ();
			$em->persist ( $images );
			$em->flush ();
			
			return $this->redirect ( $this->generateUrl ( 'homepage' ) );
		}
		
		return $this->render ( 'default/uploader.html.twig', array (
				'form' => $form->createView () 
		) );
	}
	
	/**
	 * @Route("/uploadershow/{b}", name="uploadshow")
	 */
	public function uploadshow(Request $a, $b) 
	{
		$form = $this->createFormBuilder ()->add ( 'get', TextType::class )->getForm ();
		
		$form2 = $this->createFormBuilder ()->add ( 'remove', TextType::class )->getForm ();
		
		$form->handleRequest ( $a );
		$form2->handleRequest ( $a );
		
		if ($form->isSubmitted () && $form->isValid ()) 
		{
			
			$val = $form ["get"]->getData ();
			$product = $this->getDoctrine ()->getRepository ( 'AppBundle:Images' )->find ( $val );
			
			if (! $val || ! $product) 
			{
				throw $this->createNotFoundException ( 'No product found for id ' . $val );
			}
			
			return $this->render ( 'default/uploadershow.html.twig', array (
					'li' => $this->container->get ( 'vich_uploader.templating.helper.uploader_helper' )->asset ( $product, "imageFile" ),
					'form' => $form->createView (),
					'form2' => $form2->createView () 
			) );
		}
		
		if ($form2->isSubmitted () && $form2->isValid ()) 
		{
			
			$val = $form2 ["remove"]->getData ();
			$product = $this->getDoctrine ()->getRepository ( 'AppBundle:Images' )->find ( $val );
			
			if (! $val || ! $product) 
			{
				throw $this->createNotFoundException ( 'No product found for id ' . $val );
			}
			
			$em = $this->getDoctrine ()->getManager ();
			$em->remove ( $product );
			$em->flush ();
			
			return $this->render ( 'default/uploadershow.html.twig', array (
					'li' => 'deleted ' . $val,
					'form' => $form->createView (),
					'form2' => $form2->createView () 
			) );
		}
		
		if ($b > 0) 
		{
			$val = $b;
			$product = $this->getDoctrine ()->getRepository ( 'AppBundle:Images' )->find ( $val );
			
			if (! $val || ! $product) 
			{
				throw $this->createNotFoundException ( 'No product found for id ' . $val );
			}
		} 
		else 
		{
			return $this->render ( 'default/uploadershow.html.twig', array (
					'li' => 'uploads/images/',
					'form' => $form->createView (),
					'form2' => $form2->createView () 
			) );
		}
		
		return $this->render ( 'default/uploadershow.html.twig', array (
				'li' => 'uploads/images/' . $product->getImageName (),
				'form' => $form->createView (),
				'form2' => $form2->createView () 
		) );
	}
	
}
