<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Post;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ContactType;

class PageController extends AbstractController
{

    #[Route('/',methods:['GET'], name: 'index')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('page/index.html.twig',[
            'posts' => $entityManager->getRepository(Post::class)->findAll()
        ]);

    }

    #[Route('/category',methods:['GET'], name: 'category')]
    public function categories(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('category/index.html.twig',[
            'categories' => $entityManager->getRepository(Category::class)->findAll()
        ]);

    }
    #[Route('/contact-v1',methods:['GET', 'POST'], name: 'contact-v1')]
    public function contactV1(Request $request): Response
    {
        $form = $this->createFormBuilder()
                ->add('email', TextType::class)
                ->add('message', TextareaType::class, [
                    'label'=> 'Comentario, sugerenci o mensaje'
                ])
                ->add('save', SubmitType::class, [
                    'label' => 'Enviar'
                ])
                // ->setMethod('GET')
                // ->setAction('home')
                ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() ) {
            //getData() contiene todo los valores que se han enviado

            dd($form->getData(), $request);
        }

        return $this->render('page/contact-v1.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/contact-v2',methods:['GET', 'POST'], name: 'contact-v2')]
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
                

        $form->handleRequest($request);

        if($form->isSubmitted() ) {
            //getData() contiene todo los valores que se han enviado

            dd($form->getData(), $request);
        }

        return $this->render('page/contact-v2.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/contact-v3',methods:['GET', 'POST'], name: 'contact-v3')]
    public function contactV3(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
                

        $form->handleRequest($request);

        if($form->isSubmitted() ) {
            $this->addFlash('info', 'Prueba form #3 con éxito');
            return $this->redirectToRoute('contact-v3');
        }

        return $this->render('page/contact-v3.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
