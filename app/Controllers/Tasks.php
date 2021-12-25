<?php

namespace App\Controllers;

use App\Entities\Task;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Faker\Provider\Person;
use http\Client\Request;
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

        $task = new Task;

        return view('Tasks/new', [
            'task' => $task
        ]);
    }

    /**
     * @throws \ReflectionException
     */
    public function create()
    {
        $model = new \App\Models\TaskModel;

        $task = new Task($this->request->getPost());

        $result = $model->insert($task);

        if ($model->insert($task)) {

            return redirect()->to("/Tasks/show/{$model->insertID}")
                ->with('info', "Task Created Successfully");


        } else {

            return redirect()->back()
                ->with('errors', $model->errors())
                ->with('warning', "Invalid data")
                ->withInput();
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

        $result = $model->update($id, [
           'description' => $this->request->getPost('description')
        ]);

        if ($result) {

            return redirect()->to("/Tasks/show/$id")
                             ->with('info', 'Task Updated Successfully');

        } else {

            return redirect()->back()
                             ->with('errors', $model->errors())
                             ->with('warning', "Invalid Data Entry")
                             ->withInput();

        }
    }
}

