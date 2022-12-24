<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/category/create', name:'category_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoryType::class);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($form->getData());
            $entityManager->flush();

            $this->addFlash('success', 'Categoria guardada correctamente');
            return $this->redirectToRoute('category_create');
        }


        return $this->render('category/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/category/{id}/editar', name:'category_edit', methods:['GET', 'POST'])]
    public function edit(Category $category, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoryType::class, $category );


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

           // $entityManager->persist($form->getData()); línea opcional
            $entityManager->flush();

            $this->addFlash('success', 'Categoria editada correctamente');
            return $this->redirectToRoute('category_edit', [
                'id' => $category->getId(),
            ]);
        }


        return $this->render('category/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
