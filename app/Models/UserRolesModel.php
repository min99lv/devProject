<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\UserRoles;

class UserRolesModel extends Model
{
    protected $table = 'user_roles';
    protected $primaryKey = null;  // 
    protected $allowedFields = ['user_id', 'role_id'];
    protected $returnType = UserRoles::class;
    protected $useTimestamps = false;
}

