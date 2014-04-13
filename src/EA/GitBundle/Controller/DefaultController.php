<?php

namespace EA\GitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function indexAction()
    {
        return $this->render('EAGitBundle:Default:index.html.twig', array());
    }
}
