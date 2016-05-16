<?php include "header.php" ?>
<div class="container">
    <form action="/?r=/join/request" method="post" class="auth-form">
        <h3 class="auth-form-title">JOIN</h3>
        <label for="id">
            아이디
            <input type="text" name="id" />
        </label>
        <label for="name">
            이름
            <input type="text" name="name" />
        </label>
        <label for="password">
            패스워드
            <input type="password" name="password" />
        </label>
        <label for="password">
            패스워드 재확인
            <input type="password" name="password2" />
        </label>
        <input type="submit" value="회원가입" class="btn-primary" />
    </form>
</div>
<?php include "footer.php" ?>
