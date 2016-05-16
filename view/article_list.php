<?php
    include "header.php";
    /** @var \Model\Article[] $articles */
?>
<div class="container">
    <?php if(count($articles) > 0) : ?>
    <ul class="article-list">
        <?php
        krsort($articles);
        foreach($articles as $article) :
        ?>
            <li class="article-list-item">
                <a href="/?r=/article/<?=$article->getId()?>" class="article-list-item-subject"><?=$article->getSubject()?></a>
                <p class="article-list-item-summary"><?=$article->getSummary(10)?></p>
                <p class="article-list-item-meta"><?=$article->getDate()." ".$article->getUser()->getName()?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php else : ?>
    <div class="no-article">
        <i class="xi-notice"></i>
        <p>글이 없습니다.</p>
    </div>
    <?php endif; ?>
</div>
<?php include "footer.php" ?>
