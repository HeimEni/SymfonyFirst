<?php

namespace App\Services;

use App\Repository\TaskRepository;

class TaskService
{
    private TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    public function getAll(){
        return $this->taskRepository->findAll();
}
    public function getById(int $id){
        return $this->taskRepository->find($id);
    }
    public function getByState(int $state){
        return $this->taskRepository->findBy(["state" => $state]);
    }
}