<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CreatePostController extends Controller
{
    /**
     * @Route("/createPost", name="createPost")
     */
    public function createPostAction()
    {
        

        $form = $this->createFormBuilder($item)

        return $this->render('default/createPost.html.twig');
    }
}
