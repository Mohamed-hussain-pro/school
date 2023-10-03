<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CourseRepository;

class HomeController extends AbstractController
{
    private $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {

        $courses = $this->courseRepository->findAll();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'courses' => $courses,
        ]);
    }
}
