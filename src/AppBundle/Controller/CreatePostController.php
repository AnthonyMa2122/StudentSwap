<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Images;
use AppBundle\Entity\Item;

use AppBundle\Form\ImagesType;
use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Validator\Constraints\DateTime;

class CreatePostController extends Controller
{
    /**
     * @Route("/createPost", name="createPost")
     */
    public function createPostAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $item = new Item();

        $form = $this->createFormBuilder($item)
            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('price', NumberType::class)
            ->add('category', ChoiceType::class, array(
                'choices' => array(
                    'Book' => "book",
                    'Tech' => "tech",
                    'Clothes' => "clothes",
                    'Service' => "service",
                    'Other' => "other")
            ))
            ->add('condition', ChoiceType::class, array(
                'choices' => array(
                    'New' => 'new',
                    'Good' => 'good',
                    'Poor' => 'poor',
                    'N/A' => 'n/a')
            ))
            ->add('image', ImagesType::class, array('label' => 'Upload Image'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // $form->getData() holds the submitted values
            $item = $form->getData();

            $user = $this->getUser()->getId();

            $item->setUserId($user);
            //$item->setDateCreated(new DateTime());
            //$item->setImageUrl('fake');

            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $item->setImageUrl("../web" . $this->container->get('vich_uploader.templating.helper.uploader_helper')->asset($item->getImage(), "imageFile"));
            $em->persist($item);

            try {
                $em->flush();
                $item->getImage()->setPostId($item->getId());
                $em->persist($item);
                $em->flush();
            } catch (\Exception $e) {
                return $this->render('default/createPost.html.twig', array('form' => $form->createView()));
            }

            return $this->redirectToRoute('homepage');
        }


        return $this->render('default/createPost.html.twig', array('form' => $form->createView()));
    }
}
