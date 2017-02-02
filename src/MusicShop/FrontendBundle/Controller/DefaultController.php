<?php

namespace MusicShop\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MusicShopFrontendBundle:Default:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('MusicShopFrontendBundle:Default:contact.html.twig');
    }
}
