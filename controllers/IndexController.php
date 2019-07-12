<?php
require_once 'models/User.php';

class IndexController
{
    function index()
    {
        $user = new User();
        $users = $user->getAll();

        require_once 'views/index/articles.php';
        require_once 'views/index/team.php';
        require_once 'views/index/our_project.php';
    }
}