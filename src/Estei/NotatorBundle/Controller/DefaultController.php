<?php

namespace Estei\NotatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EsteiNotatorBundle:Default:index.html.twig', array('name' => $name));
    }
}
