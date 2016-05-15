<?php include "header.php" ?>
<?php
    /**
     * @var \Model\Article $article
     */
?>
<div class="container">
<?php if($article->getSecret() === "" || (isset($_POST["article_password"]) && $_POST["article_password"] === $article->getSecret())) { ?>
    <p>작성일 : <?= $article->getDate(); ?></p>
    <p>제목 : <?= $article->getSubject(); ?></p>
    <p>작성자 : <?= $article->getUser()->getName(); ?></p>
    <p>내용 : <?= $article->getContent(); ?></p>
    <p>지출 내역</p>
    <?php foreach($article->getReceipts() as $receipt) : ?>
    <p>내용 : <?= $receipt->getSummary(); ?></p>
    <p>통화 : <?= $receipt->getCurrency(); ?></p>
    <p>가격 : <?= $receipt->getPrice(); ?></p>
    <?php endforeach; ?>
    <?php if($isOwner == true){ ?>
    <a href="/?r=/articles/my">목록</a>
    <a href="/?r=/article/modify/<?=$article->getId()?>">수정</a>
    <a href="/?r=/article/remove/<?=$article->getId()?>">삭제</a>
    <?php } else{ ?>
    <a href="/?r=/user/<?=$article->getUser()->getId()?>/articles">목록</a>
<?php }
    } else{
?>
    
<form method="post" class="secret-form">
    <div class="lock-icon">
        <i class="xi-lock"></i>
        <p>비밀글입니다.</p>
    </div>

    비밀번호 : <input type="password" name="article_password">
    <input type="submit" value="확인">
</form>
<?php } ?>
</div>
<?php include "footer.php" ?>
