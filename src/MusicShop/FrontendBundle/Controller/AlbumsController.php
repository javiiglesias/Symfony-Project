<?php

namespace MusicShop\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumsController extends Controller
{
    public function indexAction()
    {
        return $this->render('MusicShopFrontendBundle:Default:albums.html.twig');
    }
}
