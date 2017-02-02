<?php

namespace MusicShop\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArtistsController extends Controller
{
    public function indexAction()
    {
    	$artists = $this->getDoctrine()->getRepository('MusicShopFrontendBundle:Artists')->findAll();

        return $this->render('MusicShopFrontendBundle:Default:artists.html.twig', array(
        	'artists' => $artists));
    }

    public function artistAction($id)
    {   
        $artists = $this->getDoctrine()->getRepository('MusicShopFrontendBundle:Artists')->findById($id);

        if (!$artists) {
            /*throw $this->createNotFoundException(
                'No s\'ha trobat artista per la id '.$id
            );*/
            $response = $this -> render('MusicShopFrontendBundle:Default:404.html.twig', array(
                'message'   => 'No s\'ha trobat artista per la id '.$id
            ));

            $response -> setStatusCode(404);    

            return $response;
        }

        return $this->render('MusicShopFrontendBundle:Default:artists.html.twig', array(
            'titol' => 'Nom de l\'artista',
            'artists' => $artists));
    }
}
