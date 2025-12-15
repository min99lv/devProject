<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Entities\Users;

class UserController extends BaseController{
    protected $userService;

    public function __construct(){
        $this->userService = service('userService');
    }

    // 내 정보 보기
    public function show(){
        $id = session()->get('id');
        $user = $this->userService->getUserById(session()->get('id'));

        return render('user/profile', ['user' => $user]);
    }
}


?>