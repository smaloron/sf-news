<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ArticleController
 * @package AppBundle\Controller
 *
 * @Route("article")
 */

class ArticleController extends Controller
{
    /**
     * @Route("/", name="article_list")
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('article/index.html.twig');
    }

    /**
     * @Route("/{id}", name="article_details")
     * @return Response
     */
    public function detailsAction($id)
    {
        $dataprovider = $this->get('data_provider');
        $articles = $dataprovider->getAllArticles();
        $article = null;

        foreach ($articles as $item){
            if($item['id'] == $id){
                $article = $item;
            }
        }

        return $this->render('article/details.html.twig',
            ['article' => $article]
        );
    }

    /**
     * @Route("/new", name="article_new")
     * @Route("/edit/{id}", name="article_edit")
     * @param int $id
     * @return Response
     */
    public function addEditAction($id = null)
    {
        return $this->render('article/form.html.twig');
    }


}
