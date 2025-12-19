<?= $this->extend('layouts/user/layout') ?>

<?= $this->section('content') ?>
    <h2>회원가입</h2>
    
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; background-color: #ffebee; padding: 10px; margin-bottom: 20px; border-radius: 3px;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?= form_open('auth/storeRegister', ['style' => 'max-width: 500px;']); ?>
        <?= csrf_field() ?>
    
        <div style="margin-bottom: 15px;">
            <label for="username">아이디:</label>
            <input type="text" id="username" name="username" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
    
        <div style="margin-bottom: 15px;">
            <label for="name">이름:</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
    
        <div style="margin-bottom: 15px;">
            <label for="password">비밀번호:</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
    
        <div style="margin-bottom: 15px;">
            <label for="password_confirm">비밀번호 확인:</label>
            <input type="password" id="password_confirm" name="password_confirm" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
    
        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 3px; cursor: pointer;">
            회원가입
        </button>
    <?= form_close(); ?>

    <p style="text-align: center; margin-top: 20px;">
        이미 계정이 있으신가요? <a href="/auth/login">로그인</a>
    </p>
<?= $this->endSection() ?>
