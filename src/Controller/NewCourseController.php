<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CourseType;
use App\Entity\Course;
use App\Entity\Student;


class NewCourseController extends AbstractController
{

    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/new/course', name: 'app_new_course')]
    public function index(): Response
    {

        var_dump("Reached here 1"); // Debugging statement

        return $this->render('new_course/index.html.twig', [
            'controller_name' => 'NewCourseController',
        ]);
    }

    #[Route('/new/course/process', name: 'app_new_course_process', methods: ['POST'])]
    public function newCourseAction(Request $request)
    {
    var_dump($request->request->get('_course-title')); // Debugging statement

    $course = new Course();

    var_dump($request->request->get('_course-title') && $request->request->get('_course-description')); // Debugging statement

    var_dump($request->request->get('_course-description')); // Debugging statement



    if ($request->request->get('_course-title') && $request->request->get('_course-description')) {
        // Save the course to the database
        $course->setTitle($request->request->get('_course-title'));
        $course->setDescription($request->request->get('_course-description'));
        
        var_dump($course); // Debugging statement

        $this->entityManager->persist($course);
        $this->entityManager->flush();

        // Handle students data
        $studentData = [
            [
                'name' => $request->request->get('_student-name-1'),
                'email' => $request->request->get('_student-email-1')
            ],
            [
                'name' => $request->request->get('_student-name-2'),
                'email' => $request->request->get('_student-email-2')
            ],
            [
                'name' => $request->request->get('_student-name-3'),
                'email' => $request->request->get('_student-email-3')
            ]
        ];

        // persist and flush the student entity
        foreach ($studentData as $studentDatum) {
            $student = new Student();
            $student->setName($studentDatum['name']);
            $student->setEmail($studentDatum['email']);

            $this->entityManager->persist($student);

            // Associate the student with the course
            //$course->addStudent($student);
        }

        $this->entityManager->flush();

        return $this->redirectToRoute('app_home');
    }

    return $this->render('new_course/index.html.twig');
    }

}
