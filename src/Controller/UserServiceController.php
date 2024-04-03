<?php

namespace App\Controller;

use App\Entity\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserServiceController extends AbstractController
{
    #[Route('/user-services', name: 'app_user_service')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $userService = new UserService();
        $userService->setTitle('test');
        $userService->setPrice(100.02);
        $userService->setUserId();
        $userService->setCategoryId();
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($userService);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();


        return $this->render('user_service/index.html.twig', [
            'controller_name' => 'UserServiceController',
        ]);
    }
}
