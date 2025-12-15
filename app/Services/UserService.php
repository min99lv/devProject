<?php
namespace App\Services;

use App\Models\UsersModel;

class UserService{
    protected $usersModel;

    public function __construct(){
        $this->usersModel = service('usersModel');
    }

    public function getUserById($id){
        return $this->usersModel->find($id);
    }
}

?>