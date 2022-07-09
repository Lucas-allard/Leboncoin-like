<?php

namespace App\Controller;

use App\Repository\AdsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(
        AdsRepository $adsRepository,
        PaginatorInterface  $paginator,
        Request $request
    ): Response {
        $data = $adsRepository->findBy(
            ['active' => true],
            ['created_at' => 'desc'],
            100
        );
        $ads = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            9
        );
        return $this->render('homepage/index.html.twig', [
            'topCategories' => $adsRepository->getTopCategories(),
            'ads' => $ads
        ]);
    }
}
