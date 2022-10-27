<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function articles(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        return $this->render('article/articles.html.twig', [
            "message" => "Voici la liste de tous les articles",
            "articles" => $articles
        ]);
    }

    /**
     * @Route("/article/{id<\d+>}", name="article")
     */
    public function article($id, ArticleRepository $articleRepository, CategorieRepository $categorieRepository): Response
    {
        $article = $articleRepository->find($id);
        $value = $article->getCategorie();
        $categorie = $categorieRepository->find($value);
        return $this->render('article/article.html.twig', [
            "article" => $article,
            "categorie" => $categorie
        ]);
    }
}
