<?php include "header.php" ?>
<form action="/?r=/article/create" method="post">
    제목 : <input type="text" name="subject"><br/>
    내용 : <textarea rows="10" cols="50" name="content"></textarea><br/>
    <input type="submit" value="작성">
</form>
<?php include "footer.php" ?>
