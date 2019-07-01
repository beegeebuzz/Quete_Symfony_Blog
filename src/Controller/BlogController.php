<?php
// src/Controller/BlogController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class BlogController
 * @Route("/blog", name="blog_")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'owner' => 'Bastien',
        ]);
    }

    /**
     * @Route("/show/{slug}", requirements={"slug"="[a-z0-9-]+"}, defaults={"slug"= "article-sans-titre"}, name="show")
     */
    public function show($slug):Response
    {
        $slug = ucwords(str_replace("-", " ", $slug));
        return $this->render('blog/show.html.twig', [
            'slug' => $slug
        ]);
    }
}