<?php
namespace Application\controller;
use Application\core\Controller;

/**
 * Class Problem
 */
class Problem extends Controller
{

    /**
     * page erreur
     */
    public function index()
    {
        $this->view('view/problem/index.php');
    }
}