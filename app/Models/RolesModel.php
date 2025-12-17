<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Roles;

class RolesModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description'];
    protected $returnType = Roles::class;
    protected $useTimestamps = false;
}

