<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewCourseController extends AbstractController
{
    #[Route('/new/course', name: 'app_new_course')]
    public function index(): Response
    {
        return $this->render('new_course/index.html.twig', [
            'controller_name' => 'NewCourseController',
        ]);
    }
}
