<?php

namespace EA\GitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GitResourceController extends Controller
{

	public function indexAction($user){
		$ch = curl_init();
		$url= "https://api.github.com/users/".$user."/repos";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)"); 

		$response = curl_exec($ch);

		$response = new Response($response);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}
}
