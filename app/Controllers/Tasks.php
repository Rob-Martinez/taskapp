<?php

namespace App\Controllers;


use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Faker\Provider\Person;
use Psr\Log\LoggerInterface;

class Tasks extends BaseController
{
    public function index(): string
    {
        $model = new \App\Models\TaskModel;

        $data = $model->findAll();

        return view("Tasks/index", [
            'tasks' => $data
        ]);
    }

    public function show($id): string
    {
        $model = new \App\Models\TaskModel;

        $task = $model->find($id);

        return view('Tasks/show', [
            'task' => $task
        ]);

    }

    public function new(): string
    {
        return view('Tasks/new');
    }

    public function create()
    {
        $model = new \App\Models\TaskModel;

        $this->request->getPost("description");

        $result = $model->insert([
            'description' => $this->request->getPost("description")
        ]);

        if ($result === false){

            return redirect()->back()
                             ->with('errors', $model->errors())
                             ->with('warning', "Invalid data");

        } else {

            return redirect()->to("/Tasks/show/$result")
                             ->with('info', "Task Created Successfully");

        }
    }

    public function edit($id): string
    {
        $model = new \App\Models\TaskModel;

        $task = $model->find($id);

        return view('Tasks/edit', [
            'task' => $task
        ]);
    }

    /**
     * @throws \ReflectionException
     */
    public function update($id): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new \App\Models\TaskModel;

        $model->update($id, [
           'description' => $this->request->getPost('description')
        ]);

        return redirect()->to("/Tasks/show/$id")
                         ->with('info', 'Task Updated Successfully');
    }
}

