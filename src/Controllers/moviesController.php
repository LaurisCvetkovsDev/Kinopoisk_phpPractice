<?php
namespace App\Controllers;

use App\Kernel\Controller\Controller;

class MoviesController extends Controller
{
    public function index()
    {
        $this->view('movies');
    }

    public function add()
    {
        $this->view('admin/movies/add');
    }
    public function store()
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:10']
        ]);
        if (!$validation) {
            $this->redirect('/admin/movies/add');
        } else {
            dump('Validation passed');
        }


    }
}