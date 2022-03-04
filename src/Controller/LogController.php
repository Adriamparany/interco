<?php

namespace App\Controller;

use App\Entity\Log;
use App\Form\LogType;
use App\Repository\LogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/log')]
class LogController extends AbstractController
{
    #[Route('/', name: 'log_index', methods: ['GET'])]
    public function index(LogRepository $logRepository): Response
    {
        return $this->render('log/index2.html.twig', [
            //'logs' => $logRepository->findAll(),
            //'logs' => $logRepository->findBy(array(), array('username' => 'asc', 'datelog'=>'desc')),
            'results' => $logRepository->findAllLastLogForEachUsername(),
            'isEditable' => false,
        ]);
    }

    #[Route('/details/{username}', name: 'log_details', methods: ['GET'])]
    public function details(LogRepository $logRepository, $username): Response
    {
        return $this->render('log/details.html.twig', [
            'logs' => $logRepository->findByUsername($username),
            'isEditable' => false,
        ]);
    }

    #[Route('/new', name: 'log_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $log = new Log();
        $form = $this->createForm(LogType::class, $log);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($log);
            $entityManager->flush();

            //return $this->redirectToRoute('log_index', [], Response::HTTP_SEE_OTHER);
            return $this->redirectToRoute('page', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('log/new.html.twig', [
            'log' => $log,
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/new/{username}/{logtype}', name: 'log_new_api', methods: ['GET', 'POST'])]
    public function new_w_params(Request $request, EntityManagerInterface $entityManager): Response
    {
        //dd($username); => if using this, add $username as a function parameter 
        //dd($request);
        $log = new Log();
        $log->setUsername($request->get('username'));
        $log->setDatelog(new \DateTime());
        $log->setLogtype($request->get('logtype'));
        $form = $this->createForm(LogType::class, $log);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($log);
            $entityManager->flush();

            if($request->get('logtype') == 'logout'){
                return $this->redirectToRoute('app_logout', [], Response::HTTP_SEE_OTHER);
            }
            
            /*if($request->get('username') == 'dg'){
                return $this->redirectToRoute('log_index', [], Response::HTTP_SEE_OTHER);
            }else{
                return $this->redirectToRoute('page', [], Response::HTTP_SEE_OTHER);
            }*/
            return $this->redirectToRoute('page', [], Response::HTTP_SEE_OTHER);
        }

        
        return $this->render('log/new.html.twig', [
            'log' => $log,
            'form' => $form->createView(),
            'autosubmit' => true,
            'isEditable' => false,
            'isShowPage' => true,
        ]);
    }
    

    #[Route('/{id}', name: 'log_show', methods: ['GET'])]
    public function show(Log $log): Response
    {
        return $this->render('log/show.html.twig', [
            'log' => $log,
        ]);
    }

    #[Route('/{id}/edit', name: 'log_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Log $log, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LogType::class, $log);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('log_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('log/edit.html.twig', [
            'log' => $log,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'log_delete', methods: ['POST'])]
    public function delete(Request $request, Log $log, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$log->getId(), $request->request->get('_token'))) {
            $entityManager->remove($log);
            $entityManager->flush();
        }

        return $this->redirectToRoute('log_index', [], Response::HTTP_SEE_OTHER);
    }
}
