<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내 정보</title>
</head>
<body>

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
            <td><?= session()->get('username') ?></td>
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
</body>
</html>