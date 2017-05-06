<?php

namespace AppBundle\Controller;

require __DIR__ . '../../../../vendor/autoload.php';

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twilio\Rest\Client;

class TextController extends Controller
{

  /**
   *  @Route("/text/{to}/{msg}", name="text")
   */
  public function textAction($to, $msg)
  {

    $sid = 'AC5e0549fc2a283c8099b2924e8e637e70';
    $token = '966d65508f2efd6d2fff51d9597fd5e4';
    $client = new Client($sid, $token);

    $client->messages->create(
        '+'.$to,
        array(
            'from' => '+14156854120',
            'body' => $msg
        )
    );

    return new Response("<p>Message sent.</p>");

  }

}
