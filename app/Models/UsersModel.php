<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Users;

class UsersModel extends Model
{
    protected $table = 'users';
    // 외부에서 변경하려는 필드만 작성
    protected $allowedFields = ['username', 'password', 'name'];

    // id, created_at, updated_at 필드는 자동으로 처리 되므로 변경하지 않음

    // protected $returnType = 'App\Entities\Users'; // 이렇게도 사용 가능
    protected $returnType = Users::class;
    // 타임스탬프 자동 처리
    protected $useTimestamps = true;

}
?>