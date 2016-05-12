<?php include "header.php" ?>
<div class="container">
    <ul class="article-list">
        <?php
        /** @var \Model\Article $article */
        krsort($articles);
        foreach($articles as $article) :
        ?>
            <li class="article-list-item">
                <a href="/?r=/article/<?=$article->getId()?>" class="article-list-subject"><?=$article->getSubject()?></a>
                <p><?=$article->getDate()." ".$article->getUser()->getName()?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php include "footer.php" ?>
