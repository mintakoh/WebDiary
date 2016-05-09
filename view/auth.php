<?php include "header.php" ?>
<div class="container">
    <form action="/?r=/auth/login" method="post" class="auth-form">
        <h3 class="auth-form-title">LOGIN</h3>
        <label for="id">
            아이디
            <input type="text" name="id" />
        </label>
        <label for="password">
            패스워드
            <input type="password" name="password" />
        </label>
        <input type="submit" value="로그인" class="btn-primary" />
    </form>
</div>
<?php include "footer.php" ?>
