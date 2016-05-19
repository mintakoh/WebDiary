<?php
    include "header.php";
    /** @var \Model\Article[] $articles */
    /** @var $pages */
    /** @var $isOwner */
    /** @var $userId */
?>
<div class="container">
    <?php if(count($articles) > 0) : ?>
    <ul class="article-list">
        <?php foreach($articles as $article) : ?>
            <li class="article-list-item">
                <a href="/?r=/article/<?=$article->getId()?>" class="article-list-item-subject"><?=$article->getSubject()?></a>
                <p class="article-list-item-summary"><?=$article->getSummary(150)?></p>
                <p class="article-list-item-meta"><?=$article->getDate()?> <?=$article->getUser()->getName()?> <i class="xi-<?=$article->getWeather()?>"></i> <?=$article->getWeatherText()?></i></p>
            </li>
        <?php endforeach; ?>
        <?php
        if($next <= 0) {
        ?>
        <a>이전</a>
        <?php }
        else {
            if ($isOwner == true) {
                ?>
                <a href="/?r=/articles/my/<?= ($next - 1) * 4 + 1 ?>">이전</a>
                <?php
            } else {
                ?>
                <a href="/?r=/user/<?= $userId?>/articles/<?= ($next - 1) * 4 + 1 ?>">이전</a>
                <?php
            }
        }
        ?>
        <?php
        if($pages%4 !== 0)
        {
            for ($i = 1 + 4 * $next; $i <= $pages - (floor($pages/4) - $next); $i++) {
                if($isOwner == true) {
                    ?>
                    <a href="/?r=/articles/my/<?= $i ?>"><?= $i ?></a>
                    <?php
                }else{
                    ?>
                    <a href="/?r=/user/<?= $userId?>/articles/<?= $i ?>"><?= $i ?></a>
                    <?php
                }
            }
        }
        ?>
        <?php
        if($next >= floor($pages/4)){
        ?>
        <a>다음</a>
        <?php }
        else {
            if ($isOwner == true) {
                ?>
                <a href="/?r=/articles/my/<?= ($next + 1) * 4 + 1 ?>">다음</a>
                <?php
            } else {
                ?>
                <a href="/?r=/user/<?= $userId?>/articles/<?= ($next + 1) * 4 + 1 ?>">다음</a>
                <?php
            }
        }
        ?>
    </ul>
    <?php else : ?>
    <div class="no-article">
        <i class="xi-notice"></i>
        <p>글이 없습니다.</p>
    </div>
    <?php endif; ?>
</div>
<?php include "footer.php" ?>
