<?php

namespace App\Controller;

use App\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\DataTableFactory;
use Symfony\Component\Messenger\Message;
use App\Message\NewsParser;
use Symfony\Component\Messenger\MessageBusInterface;


class NewsController extends AbstractController
{
      /**
     * @Route("/news")
     */


    public function index(Request $request, MessageBusInterface $bus): Response
    {
        $article=new NewsParser();
        $bus->dispatch(new NewsParser("article"));

//        $query = $this->em->getRepository(News::class)
//            ->createQueryBuilder('u')
//            ->getQuery();
//
//        $paginator = new Paginator($query);
//
//        $pageSize = 5;
//
//        $totalItems = count($paginator);
//
//        $pageCount = ceil($totalItems/$pageSize);
//        $news = $paginator
//            ->getQuery()
//            ->setFirstResult($pageSize * ($request->page-1))
//            ->setMaxResults($pageSize)
//            ->getResult(Query::HYDRATE_OBJECT);
//
//        return $this->render('news.html.twig', [
//            'news'=>$news,
//            'pageCount'=>$pageCount,
//            'nextPage'=>($pageCount > $page)? "/news/" . ($page + 1): "#",
//            "lastPage"=>($page == 1)?"#":"/news/" . ($page - 1)
//        ]);

        return $this->render('news/index.html.twig');

    }
    /**
     * @Route("/news/post")
     */
       public function show($page): \Symfony\Component\HttpFoundation\Response
    {

    }


      public function delete($id, Request $request)
    {
        $query = $this->em->getRepository(News::class)->find($id);
        $this->em->remove($query);
        $this->em->flush();
        return $this->redirect($request->headers->get('referer'));
    }
}
