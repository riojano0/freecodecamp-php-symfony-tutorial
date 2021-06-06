<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

#[Route('/post', name: 'post.')]
class PostController extends AbstractController {


    #[Route('/', name: 'index')]
    public function index(PostRepository $postRepository): Response 
    {

        $posts = $postRepository->findAll();
        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(Request $request): Response 
    {

        $post = new Post();

        $form = $this->createForm(type:PostType::class, data:$post);

        $form->handleRequest($request);
        $form->getErrors();

        if ($form->isSubmitted() && $form->isValid()) {
            $em =  $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl(route: 'post.index'));
        }

        return $this->render(view:'post/create.html.twig', parameters: [
            'form' => $form->createView()
        ]);
    }


   #[Route('/show/{id}', name: 'show')]
    public function show(Post $post): Response 
    {

        return $this->render(view:'post/show.html.twig', parameters: [
            'post' => $post
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function remove(Post $post): Response 
    {

        $em =  $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();

        $this->addFlash(type:'success', message: 'Post Removed');

        return $this->redirect($this->generateUrl(route: 'post.index'));
    }
}
