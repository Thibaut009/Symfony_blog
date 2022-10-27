<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function categories(CategorieRepository $categorieRepository): Response
    {
        $categories = $categorieRepository->findAll();
        return $this->render('categorie/categories.html.twig', [
            "message" => "Voici la liste de toutes les categories",
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/categorie/{id<\d+>}", name="categorie")
     */
    public function categorie($id, CategorieRepository $categorieRepository, ArticleRepository $articleRepository): Response
    {
        $categorie = $categorieRepository->find($id);
        $articles = $articleRepository->findBy(array('categorie' => $categorie));
        return $this->render('categorie/categorie.html.twig', [
            "message" => "Voici la liste de touts les articles de la categorie",
            "categorie" => $categorie,
            'articles' => $articles
        ]);
    }
}
