<?php

namespace EA\GitBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Response;

class GitResourceControllerTest extends WebTestCase
{
	public function testIndexReturnSomeValue()
    {
    	$client = static::createClient(array(), array(
    		'PHP_AUTH_USER' => 'oscar',
    		'PHP_AUTH_PW'   => 'oscartw',
    		));
    	$crawler = $client->request('GET', '/repos/owidjaya');
        $response = $client->getResponse();
        $this->assertTrue(substr($response->getContent(),0,1) != "");
        $this->assertTrue($response->headers->get("Content-type") == "application/json");
    }
}
