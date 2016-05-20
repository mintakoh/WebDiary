<?php include "header.php" ?>
<?php
    /**
     * @var \Model\Article $article
     */
?>
<div class="container">
<?php if($article->getSecret() === "" || (isset($_POST["article_password"]) && $_POST["article_password"] === $article->getSecret())) { ?>

    <div class="article-view">

        <div class="pull-left">
            <h3 class="article-view-title"><?= $article->getSubject(); ?></h3>
            <div class="article-view-meta">
                <span><i class="xi-calendar"></i> <?= $article->getDate(); ?></span>
                <span><i class="xi-user"></i> <?= $article->getUser()->getName(); ?></span>
                <span><i class="xi-<?=$article->getWeather()?>"></i> <?=$article->getWeatherText()?></span>
            </div>
            <div class="article-view-content">
                <?= nl2br($article->getContent()); ?>
            </div>
        </div>

        <div class="pull-right">
            <h3>지출 내역</h3>
            <table class="expense-statement">
                <colgroup>
                    <col width="70%" />
                </colgroup>
                <thead>
                    <th>항목</th>
                    <th>가격</th>
                </thead>
                <tbody>
                <?php foreach($article->getReceipts() as $receipt) : ?>
                <tr class="expense-statement-item">
                    <td><?=$receipt->getSummary()?></td>
                    <td class="price"><?=strtoupper($receipt->getCurrency())?> <?=number_format($receipt->getPrice())?></td>
                </tr>
                <?php endforeach; ?>
                <?php if(count($article->getReceipts()) == 0) : ?>
                    <tr class="expense-statement-item no-item">
                        <td colspan="2">지출내역이 없습니다.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="pull-right">
    <?php if($isOwner == true) : ?>
        <a href="/?r=/articles/my/1" class="btn-medium btn-primary">목록</a>
        <a href="/?r=/article/modify/<?=$article->getId()?>" class="btn-medium btn-primary">수정</a>
        <a href="/?r=/article/remove/<?=$article->getId()?>" class="btn-medium btn-primary">삭제</a>
    <?php else : ?>
        <a href="/?r=/user/<?=$article->getUser()->getId()?>/articles" class="btn-medium btn-primary">목록</a>
    <?php endif; ?>
    </div>
<?php
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
