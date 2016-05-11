<?php include "header.php" ?>
<?php
    /**
     * @var \Model\Article $article
     */
?>
<p>작성일 : <?= $article->getDate();?></p>
<p>제목 : <?= $article->getSubject();?></p>
<p>작성자 : <?= $article->getUser()->getName();?></p>
<p>내용 : <?= $article->getContent();?></p>
<?php include "footer.php" ?>
