<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Status;
use App\Models\Task;

class TaskController extends BaseController
{
    public function home()
    {
        // GET
        // '/'
        $db = \Config\Database::connect();
        $data['pending'] = $db->table('tasks_view')->where('status_id', 1)->get()->getResult('array');
        $data['completed'] = $db->table('tasks_view')->where('status_id', 2)->get()->getResult('array');
        $data['tasks'] = $db->table('tasks_view')->get()->getResult('array');
        return view('index', $data);
    }
    public function index()
    {
        // GET
        // /tasks
        $db = \Config\Database::connect();
        $data['pending'] = $db->table('tasks_view')->where('status_id', 1)->get()->getResult('array');
        return view('tasks/index', $data);
    }
    public function create()
    {
        // GET
        // /tasks/create
        helper('form');
        $statusModel = model(Status::class);
        $db = \Config\Database::connect();
        $data['types'] = $db->table('type')->get()->getResult('array');
        $data['statuses'] = $statusModel->findAll();
        return view('tasks/create', $data);
    }
    public function store()
    {
        // POST
        // /tasks
        helper('form');
        $model = model(Task::class);

        // Get the data from the request
        $data = [
            'title' => esc($this->request->getPost('title')),
            'description' => esc($this->request->getPost('description')),
            'status_id' => 1,
            'type_id' => intval(esc($this->request->getPost('type_id'))),
        ];
        echo "<pre>";
    print_r($data);
    echo "</pre>";
        // Save the data using the model
        if ($model->save($data) === false)
        {
            // Validation failed, return the errors
            $statusModel = model(Status::class);
            $db = \Config\Database::connect();
            $data['types'] = $db->table('type')->get()->getResult('array');    
            $data['errors'] = $model->errors();
            $data['statuses'] = $statusModel->findAll();
            return view('tasks/create', $data);
        }
        else
        {
            // Validation passed, redirect to home
            return redirect()->to('tasks');
        }
    }
    public function show($id)
    {
        // GET
        // /tasks/{id}
        // Show a single project, with all the details associated with it.
        $db = \Config\Database::connect();
        $data['task'] = $db->table('tasks_view')->where('id', $id)->get()->getRowArray();
        return view('tasks/show', $data);
    }
    public function destroy($id)
    {
        // DELETE
        // /tasks/{id}
        
        $session = \Config\Services::session();

        $model = model(Task::class);

        try {
            // delete the record
            $model->delete($id);
            // set flashdata with a success message
            $session->setFlashdata('msgCode', 'success');
            $session->setFlashdata('msg', 'Record deleted successfully');    
        } catch (\Exception $e) {
            // To fix error handling, see tutorial here: https://itecnote.com/tecnote/php-codeigniter-try-catch-is-not-working-in-model-class/
            $error_code = $e->getCode();
            $error_message = $e->getMessage();
            // set flashdata with the error message
            session()->setFlashdata('msgCode', "fail");
            session()->setFlashData('msg', "An error has occurred: $error_code: $error_message");
        }
        return redirect()->to('/');
    }

    // Mark Task as completed
    public function complete($id)
    {
        // POST
        // /tasks/{id}/complete
        $model = model(Task::class);
        $data = [
            "status_id" => 2, // Assuming Status 2 is Completed
        ];

        if($model->update($id, $data) === false) {
            // Validation failed, return the errors
            $data['errors'] = $model->errors();
            return view('tasks', $data);
        }
        else {
           // Validation passed, redirect to home
           return redirect()->to('/');
        }
    }
}
