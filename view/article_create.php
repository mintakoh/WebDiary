<?php include "header.php" ?>

<div id="contents" class="container">

    <?php
    /** @var \Core\Message\Message $message */
    foreach($messages as $message) : ?>
    <div class="msg-<?=$message->getType()?>">
        <?=$message->getText()?>
    </div>
    <?php endforeach; ?>

    <form action="/?r=/article/create" method="post">
    <div class="left-side">
        <div class="write-form">
            <fieldset class="form-group">
                <label for="date">날짜</label>
                <input type="date" name="date" id="date" />
            </fieldset>
            <fieldset class="form-group">
                <label for="subject">제목</label>
                <input type="text" name="subject">
            </fieldset>
            <fieldset class="form-group">
                <label for="content">내용</label>
                <textarea rows="10" cols="50" name="content"></textarea>
            </fieldset>
            <fieldset class="form-group">
                비밀글 <input type="checkbox" class="check_secret">
                <input type="password" name="secret" class="secret_password">
            </fieldset>
            <button type="submit" class="btn-primary btn-large">작성</button>
        </div>
    </div>

    <div class="right-side">
        <h3 class="receipt-list-title">지출 내역</h3>
        <ul class="receipt-list">
            <!-- <li class="receipt-list-item"> -->
        </ul>
        <button type="button" class="add-new-item btn-primary btn-medium"><i class="xi-plus"></i> 새 항목 추가</button>
    </div>

    </form>
</div>

<li class="receipt-list-item append-item">
    <input type="text" class="summary" name="summary[]" placeholder="지출 내역을 기입할 수 있습니다. (예. 기차 티켓 구매)" />
    <div class="pull-right">
        <select name="currency[]">
            <option value="krw">KRW(원)</option>
            <option value="usd">USD(달러)</option>
        </select>
        <span class="price-prefix"></span>
        <input type="text" name="price[]" />
        <span class="price-postfix"></span>
    </div>
</li>

<script>
    var appendNewReceiptItem = function() {
        $('.receipt-list-item.append-item').clone()
            .removeClass('append-item').appendTo('.receipt-list');
    };
    $('.add-new-item').click(appendNewReceiptItem);

    appendNewReceiptItem();
</script>

<?php include "footer.php" ?>
