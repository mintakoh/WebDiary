<?php include "header.php" ?>
<?php
    /**
     * @var \Model\Article $article
     */
?>
<?php
    if($article->getSecret() === "" || (isset($_POST["article_password"]) && $_POST["article_password"] === $article->getSecret())) {
        ?>
        <p>작성일 : <?= $article->getDate(); ?></p>
        <p>제목 : <?= $article->getSubject(); ?></p>
        <p>작성자 : <?= $article->getUser()->getName(); ?></p>
        <p>내용 : <?= $article->getContent(); ?></p>
        <p>지출 내역</p>
        <?php
            foreach($article->getReceipts() as $receipt) {
                ?>
                <p><?= $receipt->getSummary(); ?></p>
                <p><?= $receipt->getCurrency(); ?></p>
                <p><?= $receipt->getPrice(); ?></p>
                <?php
            }
    }
    else{
?>
<form method="post">
    <p>비밀글입니다.</p>
    비밀번호 : <input type="password" name="article_password">
    <input type="submit" value="확인">
</form>
<?php
?>
<?php }?>
<?php include "footer.php" ?>
