<?php include "header.php" ?>
<div class="container">
    <ul class="article-list">
        <?php
        /** @var \Model\Article $articles */
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
</div>
<?php include "footer.php" ?>
