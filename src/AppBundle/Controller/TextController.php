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

	/**
	 *  @Route("/forward", name="forward")
	 */
	public function forwardAction(Request $request)
	{

		$msgfrom = $request->request->get('From');
		$send = $request->request->get('Body');

		return new Response("<Response> <Message to=\"+14156598475\">$send</Message> </Response>");

	}

}
