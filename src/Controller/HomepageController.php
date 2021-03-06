<?php

namespace App\Controller;

use App\Repository\AdsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(
        AdsRepository $adsRepository
    ): Response {
        return $this->render('homepage/index.html.twig', [
            'ads' => $adsRepository->findBy(
                ['active' => true],
                ['created_at' => 'desc'],
                100
            ),
            'topCategories' => $adsRepository->getTopCategories(),
        ]);
    }
}
