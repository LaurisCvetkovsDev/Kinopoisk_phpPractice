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
        dump($this->request()->file('image'));
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:10']
        ]);
        if (!$validation) {

            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/admin/movies/add');

        } else {
            $id = $this->db()->insert(
                'movies',
                ['name' => $this->request()->input('name')]
            );
            dump("Movies added successfully with id: $id");
        }


    }
}