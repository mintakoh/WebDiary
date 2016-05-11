<?php include "header.php" ?>
<div class="container">
    <form action="/?r=/article/create" method="post" class="write-form">
        <fieldset class="form-group">
            <label for="date">날짜</label><input type="date" name="date" id="date" />
        </fieldset>
        <fieldset class="form-group">
            <label for="subject">제목</label><input type="text" name="subject">
        </fieldset>
        <fieldset class="form-group">
            내용<textarea rows="10" cols="50" name="content"></textarea>
        </fieldset>
        <fieldset class="form-group">
            비밀글 <input type="checkbox" class="check_secret">
            <input type="password" name="secret" class="secret_password">
        </fieldset>
        <button type="submit" class="btn-primary btn-large">작성</button>
    </form>
</div>
<?php include "footer.php" ?>
