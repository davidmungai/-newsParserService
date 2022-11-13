<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="app_news")
     */
       public function index($page): \Symfony\Component\HttpFoundation\Response
    {
        $query = $this->em->getRepository(News::class)
            ->createQueryBuilder('u')
            ->getQuery();

        $paginator = new Paginator($query);

        $pageSize = 5;

        $totalItems = count($paginator);

        $pageCount = ceil($totalItems/$pageSize);
        $news = $paginator
            ->getQuery()
            ->setFirstResult($pageSize * ($page-1))
            ->setMaxResults($pageSize)
            ->getResult(Query::HYDRATE_OBJECT);

        return $this->render('news.html.twig', [
            'news'=>$news,
            'pageCount'=>$pageCount,
            'nextPage'=>($pageCount > $page)? "/news/" . ($page + 1): "#",
            "lastPage"=>($page == 1)?"#":"/news/" . ($page - 1)
        ]);
    }


      public function delete($id, Request $request)
    {
        $query = $this->em->getRepository(News::class)->find($id);
        $this->em->remove($query);
        $this->em->flush();
        return $this->redirect($request->headers->get('referer'));
    }
}
