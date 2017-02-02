<?php

namespace MusicShop\BackendBundle\Controller;

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

        return $this->render('MusicShopBackendBundle:Default:categories.html.twig', array(
            'titol' => 'Llistat de Categories',
            'categories' => $categories));
    }
    
    public function addCategoryAction(Request $request)
    {
        // crea una categoria y le asigna algunos datos ficticios para este ejemplo
        $category = new Categories();
        // $category->setName('tato');
 
        $form = $this->createFormBuilder($category)
            ->add('name', TextType::class, array('label' => 'Nom'))
            ->add('save', SubmitType::class, array('label' => 'Crear Categoria'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $category = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Category is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->render('MusicShopBackendBundle:Default:categoryAdded.html.twig', array(
            'titol' => 'Nova categoria afegida',
            'name' => $category->getName()));
        }
 
        return $this->render('MusicShopBackendBundle:Default:addCategory.html.twig', array(
            'titol' => 'Afegir Categoria',
            'form' => $form->createView(),
        ));
    }

}