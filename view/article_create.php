<?php include "header.php" ?>
<form action="/?r=/article/create" method="post">
    <div>
        제목 : <input type="text" name="subject">
    </div>
    <div>
        비밀글 : <input type="checkbox" class="check_secret">
        <input type="password" name="secret" class="secret_password"><br/>
    </div>
    <div>
        내용 : <textarea rows="10" cols="50" name="content"></textarea><br/>
    </div>
    <div>
        <input type="submit" value="작성">
    </div>
</form>
<?php include "footer.php" ?>
