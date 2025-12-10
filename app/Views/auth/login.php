<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
    <h2>로그인</h2>
    
    <?php if(session()->getFlashdata('error')): ?>
        <div style="color: red; background-color: #ffebee; padding: 10px; margin-bottom: 20px; border-radius: 3px;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <div style="color: green; background-color: #ffebee; padding: 10px; margin-bottom: 20px; border-radius: 3px;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <!-- form_open() : form 태그 열기
        action 경로, 옵션(method(기본값 POST), style, class, id 등) -->
    <?= form_open('auth/authenticate', ['style' => 'max-width: 400px;']); ?>
        <!-- 폼 요청마다 난수 토큰을 자동 삽입해서 요청 위조를 방지 -->
        <?= csrf_field(); ?>
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
    <!-- form_close() : form 태그 닫기 -->
    <?=form_close(); ?>
</body>
</html>