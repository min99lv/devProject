<?php
namespace App\Services;

use App\Models\UsersModel;

class AdminService{
    private $usersModel;
    public function __construct(){
        $this->usersModel = service('usersModel');
    }

    public function getUsresList(){
        return $this->usersModel->findAll();
    }
}







?>