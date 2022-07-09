<?php

namespace App\Controller;

use App\Entity\Ads;
use App\Entity\Users;
use App\Form\AdsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


// Route par defaut
/**
 * @Route("/users", name="users_")
 * @package App\Controller
 */
class UsersController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $user = new Users;
        return $this->render('users/index.html.twig', [
            'controller_name' => $user->getFirstName(),
        ]);
    }
    /**
     * @Route("/annonces/ajout", name="annonces_ajout")
     */
    public function addAd(Request $request): Response
    {
        $ad = new Ads();

        $form = $this->createForm(AdsType::class, $ad);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ad->setUser($this->getUser());
            $ad->setActive(false);
            $em = $this->getDoctrine()->getManager();;
            $em->persist($ad);
            $em->flush();

            return $this->redirectToRoute('users_home');
        }


        return $this->render('users/ads/new_ad.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
