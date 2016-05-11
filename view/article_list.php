<?php include "header.php" ?>
<ul>
    <?php
    /** @var \Model\Article $article */
    foreach($articles as $article) :
    ?>
        <li><a href="/?r=/article/<?=$article->getId()?>"><?=$article->getSubject()?></a></li>
    <?php endforeach; ?>
</ul>
<?php include "footer.php" ?>
