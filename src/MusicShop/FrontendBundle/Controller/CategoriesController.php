<?php

namespace MusicShop\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MusicShop\FrontendBundle\Entity\Categories;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategoriesController extends Controller
{
    public function indexAction()
    {   
        $categories = $this->getDoctrine()->getRepository('MusicShopFrontendBundle:Categories')->findAll();

        return $this->render('MusicShopFrontendBundle:Default:categories.html.twig', array(
            'titol' => 'Llistat de Categories',
            'categories' => $categories));
    }

    public function categoryAction($id)
    {   
        $categories = $this->getDoctrine()->getRepository('MusicShopFrontendBundle:Categories')->findById($id);

        if (!$categories) {
            /*throw $this->createNotFoundException(
                'No s\'ha trobat categoría per la id '.$id
            );*/
            $response = $this -> render('MusicShopFrontendBundle:Default:404.html.twig', array(
                'message'   => 'No s\'ha trobat categoría per la id '.$id
            ));

            $response -> setStatusCode(404);    

            return $response;
        }

        return $this->render('MusicShopFrontendBundle:Default:categories.html.twig', array(
            'titol' => 'Nom de la Categoria',
            'categories' => $categories));
    }
}
