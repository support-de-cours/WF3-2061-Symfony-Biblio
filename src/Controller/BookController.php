<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/book', name: 'book:')]
class BookController extends AbstractController
{
    #[Route('s', name: 'index')] // site.com/books
    public function index(): Response
    {
        $books = [
            // (object) [
            //     'title' => "The First Book"
            // ],
            // (object) [
            //     'title' => "The Second Book"
            // ],
            // (object) [
            //     'title' => "The Third Book"
            // ],
        ];

        return $this->render('pages/book/index.html.twig', [
            'books' => $books
        ]);
    }

    #[Route('', name: 'create')] // site.com/book
    public function create(): Response
    {
        return $this->render('pages/book/create.html.twig', [
        ]);
    }

    #[Route('/{id}', name: 'read')] // site.com/book/42
    public function read(): Response
    {
        return $this->render('pages/book/read.html.twig', [
        ]);
    }

    #[Route('/{id}/edit', name: 'update')] // site.com/book/42/edit
    public function update(): Response
    {
        return $this->render('pages/book/update.html.twig', [
        ]);
    }

    #[Route('/{id}/delete', name: 'delete')] // site.com/book/42/delete
    public function delete(): Response
    {
        return $this->render('pages/book/delete.html.twig', [
        ]);
    }
}
