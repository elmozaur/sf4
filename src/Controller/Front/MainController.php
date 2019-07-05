<?php
namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Task;
use App\Form\TaskFormType;

use Symfony\Component\HttpFoundation\Request;


class MainController extends AbstractController
{
    /**
     * @Route("/frontmain", name="frontmain")
     */
    public function index(Request $request)
    {
		$komentarz = 'do_wysłania';
		
		$task = new Task();
		$form = $this->createForm(TaskFormType::class, $task);
		
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			// $form->getData() holds the submitted values
			// but, the original `$task` variable has also been updated
			$task = $form->getData();
			
			
			$komentarz = '<h1>wysłany i odebrany</h1>';
			// ... perform some action, such as saving the task to the database
			// for example, if Task is a Doctrine entity, save it!
			// $entityManager = $this->getDoctrine()->getManager();
			// $entityManager->persist($task);
			// $entityManager->flush();

			//return $this->redirectToRoute('task_success');
		}
		
		
        return $this->render('main/index_front.html.twig', [
            'controller_name' => 'FrontMainController',
			
			'komentarz' => $komentarz,
			
			'form' => $form->createView(),
        ]);
    }
}
