<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/MainController.php',
        // ]);

        return new Response(content:'<h1>Welcome freeCodeCamp</h1>');
    }

    #[Route('/custom/{name?}', name: 'custom')]
    public function custom(Request $request): Response {
        $name = $request->get(key:'name');
        return new Response(content:'<h1>Custom Page '. $name .'!</h2>');
    }
}
