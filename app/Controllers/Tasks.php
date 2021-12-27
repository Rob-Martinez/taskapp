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

    private $model;

    public function __construct()
    {

        $this->model = new \App\Models\TaskModel;

    }

    public function index(): string
    {

        $data = $this->model->findAll();

        return view("Tasks/index", [
            'tasks' => $data
        ]);
    }

    public function show($id): string
    {

        $task = $this->getTaskOr404($id);

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

        $task = new Task($this->request->getPost());

        if ($this->model->insert($task)) {

            return redirect()->to("/Tasks/show/{$this->model->insertID}")
                             ->with('info', "Task Created Successfully");


        } else {

            return redirect()->back()
                ->with('errors', $this->model->errors())
                ->with('warning', "Invalid data")
                ->withInput();
        }
    }

    public function edit($id): string
    {

        $task = $this->getTaskOr404($id);

        return view('Tasks/edit', [
            'task' => $task
        ]);
    }

    /**
     * @throws \ReflectionException
     */
    public function update($id): \CodeIgniter\HTTP\RedirectResponse
    {

        $task = $this->getTaskOr404($id);

        $task->fill($this->request->getPost());

        if ( ! $task->hasChanged()) {

            return redirect()->back()
                             ->with('warning', 'Nothing to Update')
                             ->withInput();

        }

        if ($this->model->save($task)) {
            return redirect()->to("/Tasks/show/$id")
                ->with('info', 'Task Updated Successfully');
        } else {

            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', "Invalid Data Entry")
                             ->withInput();

        }
    }

    public function delete($id)
    {

        $task = $this->getTaskOr404($id);

        if($this->request->getMethod() === 'post') {

            $this->model->delete($id);

            return redirect()->to("/Tasks")
                ->with('info', "Task has been deleted");

        }

        return view('Tasks/delete', [
            'task' => $task
        ]);

    }

    private function getTaskOr404($id)
    {
        $task = $this->model->find($id);

        if ($task === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id not found");
        }

        return $task;
    }
}

