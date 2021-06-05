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
        return $this->render(view:'home/index.html.twig');
    }

    #[Route('/custom/{name?}', name: 'custom')]
    public function custom(Request $request): Response {
        $name = $request->get(key:'name');

        return $this->render(view:'home/custom.html.twig', parameters: [
            'name' => $name
        ]);
    }


}
