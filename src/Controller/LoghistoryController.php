<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoghistoryController extends AbstractController
{
    #[Route('/loghistory', name: 'loghistory')]
    public function index(): Response
    {
        return $this->render('loghistory/index.html.twig', [
            'controller_name' => 'LoghistoryController',
        ]);
    }
}
