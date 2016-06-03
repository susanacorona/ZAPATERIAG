<?php

namespace InventarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DefaultController extends Controller
{
    /**
    * @Route("/", name="homepage")
    */
    public function indexAction()
    {
        return $this->render('InventarioBundle:Default:index.html.twig');
    }
}
