<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
<h2>로그인</h2>

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

<form method="POST" action="/auth/authenticate" style="max-width: 400px;">
    <?= csrf_field() ?>

    <div style="margin-bottom: 15px;">
        <label for="username">아이디:</label>
        <input type="text" id="username" name="username" required style="width: 100%; padding: 8px; margin-top: 5px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="password">비밀번호:</label>
        <input type="password" id="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
    </div>

    <button type="submit" style="width: 100%; padding: 10px; background-color: #2196F3; color: white; border: none; border-radius: 3px; cursor: pointer;">
        로그인
    </button>
</form>

<p style="text-align: center; margin-top: 20px;">
    계정이 없으신가요? <a href="/auth/register">회원가입</a>
</p>
</body>
</html>
