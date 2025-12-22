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
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; background-color: #ffebee; padding: 10px; margin-bottom: 20px; border-radius: 3px;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green; background-color: #e8f5e9; padding: 10px; margin-bottom: 20px; border-radius: 3px;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <h2>내 정보</h2>
    <?= form_open('/user/update') ?>
    <table>
        <tr>
            <td>아이디</td>
            <td><?= $user->username ?></td>
        </tr>
        <tr>
            <td>이름</td>
            <td><input type="text" name="name" value="<?= $user->name ?>"></td>
        </tr>
        <tr>
            <td>비밀번호</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>비밀번호 확인</td>
            <td><input type="password" name="password_confirm"></td>
        </tr>
        <tr>
            <td>
                <button type="submit">저장</button>
            </td>
        </tr>
    </table>
    <?= form_close() ?>
<?= $this->endSection() ?>
