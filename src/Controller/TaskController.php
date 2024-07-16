<?php

namespace App\Controller;

use App\Services\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TaskController extends AbstractController
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    #[Route('/', name: 'app_home', methods: 'GET')]
    public function index(): Response
    {
        return $this->render('task/task.html.twig', [
            'tasksStateOne' => $this->taskService->getByState(0),
            'tasksStateTwo' => $this->taskService->getByState(1),
            'tasksStateThree' => $this->taskService->getByState(2),
        ]);
    }
    #[Route('/task/{id}', name: 'app_task', methods: ['GET'])]
    public function byId(int $id, TaskService $taskService)
    {
        return $this->render('task/task.html.twig', [
            'task' => $taskService->getById($id),
        ]);
    }
}
