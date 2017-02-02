<?php

namespace MusicShop\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MusicShopBackendBundle:Default:index.html.twig');
    }
}
