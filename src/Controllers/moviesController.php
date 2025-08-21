<?php
namespace App\Controllers;

use App\Kernel\Controller\Controller;

class MoviesController extends Controller
{
    public function index()
    {
        $this->view('movies');
    }
}