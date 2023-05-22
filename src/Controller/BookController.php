<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route('/book', name: 'book:')]
class BookController extends AbstractController
{
    #[Route('s', name: 'index', methods: ["HEAD","GET"])] // site.com/books
    public function index(BookRepository $bookRepository): Response
    {
        // TODO: Make a pagination
        $books = $bookRepository->findAll();

        return $this->render('pages/book/index.html.twig', [
            'books' => $books
        ]);
    }

    #[Route('', name: 'create', methods: ["HEAD","GET","POST"])] // site.com/book
    public function create(Request $request, BookRepository $bookRepository): Response
    {
        // Check if user is granted
        // ...

        // Create the new Book object
        $book = new Book;

        // Build the form
        // Creation du formulaire basé sur l'architecture BookType
        // ET sur l'objet $book
        $form = $this->createForm(BookType::class, $book);

        // Handle the request
        $form->handleRequest($request);

        // Form treatment + form validator + saving data
        if ($form->isSubmitted() && $form->isValid())
        {
            $bookRepository->save($book, true);

            return $this->redirectToRoute('book:index');
        }

        // Create the form view
        $form = $form->createView();

        return $this->render('pages/book/create.html.twig', [
            // Binding the form
            'form' => $form
        ]);
    }

    #[Route('/{id}', name: 'read', methods: ["HEAD","GET"])] // site.com/book/42
    public function read(): Response
    {
        return $this->render('pages/book/read.html.twig', [
        ]);
    }

    #[Route('/{id}/edit', name: 'update', methods: ["HEAD","GET","POST"])] // site.com/book/42/edit
    public function update(): Response
    {
        return $this->render('pages/book/update.html.twig', [
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ["HEAD","GET","DELETE"])] // site.com/book/42/delete
    public function delete(): Response
    {
        return $this->render('pages/book/delete.html.twig', [
        ]);
    }
}
