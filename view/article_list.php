<?php include "header.php" ?>
<ul>
    <?php
    /** @var \Model\Article $article */
    krsort($articles);
    foreach($articles as $article) :
    ?>
        <li><a href="/?r=/article/<?=$article->getId()?>"><?=$article->getSubject()?></a>
        <p><?=$article->getDate()." ".$article->getUser()->getName()?></p></li>
    <?php endforeach; ?>
</ul>
<?php include "footer.php" ?>
