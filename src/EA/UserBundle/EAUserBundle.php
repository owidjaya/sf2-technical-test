<?php
namespace EA\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EAUserBundle extends Bundle{
	public function getParent(){
		return 'FOSUserBundle';
	}
}
