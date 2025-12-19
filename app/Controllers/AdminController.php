<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\DTOs\UserDTO;
use DomainException;

class AdminController extends BaseController{
    private $adminService;

    public function __construct(){
        $this->adminService = service('adminService');
    }

    public function usersList(){
        $users = $this->adminService->getUsresList();
    
        return view('admin/users/list', ['users' => $users]);
    }


}


?>