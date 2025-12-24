<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Users;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    // 외부에서 변경하려는 필드만 작성
    protected $allowedFields = ['username', 'password', 'name'];

    // id, created_at, updated_at 필드는 자동으로 처리 되므로 변경하지 않음

    // protected $returnType = 'App\Entities\Users'; // 이렇게도 사용 가능
    protected $returnType = Users::class;
    // 타임스탬프 자동 처리
    protected $useTimestamps = true;

    // 사용자의 역할 조회
    public function getUserRoles($userId){
        return $this->db->table('user_roles')
            ->select('roles.id,roles.name,roles.description')
            ->join('roles', 'roles.id = user_roles.role_id')
            ->where('user_roles.user_id', $userId)
            ->get()
            ->getResultArray();
    }

    // 사용자가 특정 역할을 가지는지 확인
    public function hasRole($userId, $roleName)
    {
        $result = $this->db->table('user_roles')
            ->join('roles', 'roles.id = user_roles.role_id')
            ->where('user_roles.user_id', $userId)
            ->where('roles.name', $roleName)
            ->countAllResults();
        
        return $result > 0;
    }

    // 사용자의 모든 권한 조회
    public function getUserPermissions($userId)
    {
        return $this->db->table('user_roles')
            ->select('permissions.code, permissions.description')
            ->join('role_permissions', 'role_permissions.role_id = user_roles.role_id')
            ->join('permissions', 'permissions.id = role_permissions.permission_id')
            ->where('user_roles.user_id', $userId)
            ->groupBy('permissions.id')
            ->get()
            ->getResultArray();
    }

}
?>