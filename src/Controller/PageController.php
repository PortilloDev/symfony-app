<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\ContactType;

class PageController extends AbstractController
{
    #[Route('/contact-v1',methods:['GET', 'POST'], name: 'contactV1')]
    public function index(Request $request): Response
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


    #[Route('/contact-v2',methods:['GET', 'POST'], name: 'contactV2')]
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

    #[Route('/contact-v3',methods:['GET', 'POST'], name: 'contactV3')]
    public function contactV3(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
                

        $form->handleRequest($request);

        if($form->isSubmitted() ) {
            //getData() contiene todo los valores que se han enviado

            dd($form->getData(), $request);
        }

        return $this->render('page/contact-v3.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
