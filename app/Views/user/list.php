<?php
// 사용자의 권한에 따라 layout 결정
$role = session()->get('role') ?? 'user';
$layout = match($role) {
    'admin' => 'layouts/admin/layout',
    default => 'layouts/user/layout',
};
?>

<?= $this->extend($layout) ?>

<?= $this->section('content') ?>
<style>
    .users-container {
        padding: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .users-header h1 {
        font-size: 28px;
        font-weight: 600;
        color: #333;
        margin: 0;
    }
    
    .add-user-btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
        transition: background-color 0.3s;
    }
    
    .add-user-btn:hover {
        background-color: #0056b3;
    }
    
    .users-table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .users-table thead {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }
    
    .users-table th {
        padding: 15px 20px;
        text-align: left;
        font-weight: 600;
        color: #555;
        font-size: 14px;
    }
    
    .users-table td {
        padding: 15px 20px;
        border-bottom: 1px solid #dee2e6;
        color: #333;
    }
    
    .users-table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .users-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .action-btn {
        padding: 6px 12px;
        margin-right: 8px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }
    
    .view-btn {
        background-color: #17a2b8;
        color: white;
    }
    
    .view-btn:hover {
        background-color: #138496;
    }
    
    .edit-btn {
        background-color: #28a745;
        color: white;
    }
    
    .edit-btn:hover {
        background-color: #218838;
    }
    
    .delete-btn {
        background-color: #dc3545;
        color: white;
    }
    
    .delete-btn:hover {
        background-color: #c82333;
    }
    
    .empty-message {
        text-align: center;
        padding: 40px;
        color: #999;
        font-size: 16px;
    }
</style>

<div class="users-container">
    <div class="users-header">
        <h1>회원 관리</h1>
        <a href="/admin/users/create" class="add-user-btn">+ 새 회원 추가</a>
    </div>
    
    <?php if (!empty($users)): ?>
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>이름</th>
                    <th>사용자명</th>
                    <th>가입일</th>
                    <th>작업</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= date('Y-m-d', strtotime($user->created_at)) ?></td>
                        <td>
                            <a href="/user/show/<?= $user->id ?>" class="action-btn view-btn">보기</a>
                            <button class="action-btn delete-btn">삭제</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty-message">
            <p>등록된 회원이 없습니다.</p>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>