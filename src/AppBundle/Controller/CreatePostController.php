<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;

class CreatePostController extends Controller
{
    /**
     * @Route("/createPost", name="createPost")
     */
    public function createPostAction(Request $request)
    {
        $item = new Item();

        $form = $this->createFormBuilder($item)
            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('category', ChoiceType::class, array(
                'choices'  => array(
                    'Book' => "book",
                    'Tech' => "tech",
                    'Clothes' => "clothes")
            ))
            ->add('condition', ChoiceType::class, array(
                'choices'  => array(
                    'New' => "new",
                    'Good' => "good",
                    'Poor' => "poor")
            ));
            //->add('Image')

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // $form->getData() holds the submitted values
            $item = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->render('default/home.html.twig');
        }


        return $this->render('default/createPost.html.twig', array('form' => $form->createView()));
    }
}
