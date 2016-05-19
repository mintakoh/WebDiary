<?php include "header.php" ?>
<?php
/**
 * @var \Model\Article $article
 */
?>
<div id="contents" class="container">

    <form action="/?r=/article/update/<?=$article->getId()?>" method="post">
        <div class="left-side">
            <div class="write-form">
                <fieldset class="form-group">
                    <label for="date">날짜</label>
                    <input type="date" name="date" id="date" value="<?= $article->getDate()?>" />
                </fieldset>
                <fieldset class="form-group">
                    <label for="subject">제목</label>
                    <input type="text" name="subject" value="<?= $article->getSubject()?>">
                </fieldset>
                <fieldset class="form-group">
                    <label for="content">내용</label>
                    <textarea rows="10" cols="50" name="content"><?= $article->getContent()?></textarea>
                </fieldset>
                <fieldset class="form-group">
                    <label>날씨</label>
                    <?php
                        switch($article->getWeather()){
                            case "sun": { ?>
                                <i class="weather-icon xi-sun"></i> 맑음 <input type="radio" name="weather" value="sun" checked/>
                                <i class="weather-icon xi-umbrella"></i> 비 <input type="radio" name="weather" value="umbrella" />
                                <i class="weather-icon xi-cloudiness"></i> 흐림 <input type="radio" name="weather" value="cloudiness"/>
                                <i class="weather-icon xi-lightning"></i> 번개 <input type="radio" name="weather" value="lightning"/>
                                <i class="weather-icon xi-snow"></i> 눈 <input type="radio" name="weather" value="snow"/>
                    <?php
                                break;}
                            case "umbrella": {?>
                    <i class="weather-icon xi-sun"></i> 맑음 <input type="radio" name="weather" value="sun" />
                    <i class="weather-icon xi-umbrella"></i> 비 <input type="radio" name="weather" value="umbrella" checked/>
                    <i class="weather-icon xi-cloudiness"></i> 흐림 <input type="radio" name="weather" value="cloudiness"/>
                    <i class="weather-icon xi-lightning"></i> 번개 <input type="radio" name="weather" value="lightning"/>
                    <i class="weather-icon xi-snow"></i> 눈 <input type="radio" name="weather" value="snow"/>
                    <?php
                                break;}
                            case "cloudiness": {?>
                    <i class="weather-icon xi-sun"></i> 맑음 <input type="radio" name="weather" value="sun" />
                    <i class="weather-icon xi-umbrella"></i> 비 <input type="radio" name="weather" value="umbrella" />
                    <i class="weather-icon xi-cloudiness"></i> 흐림 <input type="radio" name="weather" value="cloudiness" checked/>
                    <i class="weather-icon xi-lightning"></i> 번개 <input type="radio" name="weather" value="lightning"/>
                    <i class="weather-icon xi-snow"></i> 눈 <input type="radio" name="weather" value="snow"/>
                    <?php
                                break;}
                            case "lightning":{ ?>
                    <i class="weather-icon xi-sun"></i> 맑음 <input type="radio" name="weather" value="sun" />
                    <i class="weather-icon xi-umbrella"></i> 비 <input type="radio" name="weather" value="umbrella" />
                    <i class="weather-icon xi-cloudiness"></i> 흐림 <input type="radio" name="weather" value="cloudiness"/>
                    <i class="weather-icon xi-lightning"></i> 번개 <input type="radio" name="weather" value="lightning" checked/>
                    <i class="weather-icon xi-snow"></i> 눈 <input type="radio" name="weather" value="snow"/>
                    <?php
                                break;}
                            case "snow": {?>
                    <i class="weather-icon xi-sun"></i> 맑음 <input type="radio" name="weather" value="sun" />
                    <i class="weather-icon xi-umbrella"></i> 비 <input type="radio" name="weather" value="umbrella" />
                    <i class="weather-icon xi-cloudiness"></i> 흐림 <input type="radio" name="weather" value="cloudiness"/>
                    <i class="weather-icon xi-lightning"></i> 번개 <input type="radio" name="weather" value="lightning"/>
                    <i class="weather-icon xi-snow"></i> 눈 <input type="radio" name="weather" value="snow" checked/>
                    <?php
                                break;}
                        }
                    ?>

                </fieldset>
                <fieldset class="form-group">
                    <?php if($article->getSecret() !== ""){?>
                    비밀글 <input type="checkbox" class="check_secret" name="check" checked>
                    <input type="password" name="secret" class="secret_password" value="<?= $article->getSecret()?>">
                    <?php } else {?>
                    비밀글 <input type="checkbox" class="check_secret" name="check">
                    <input type="password" name="secret" class="secret_password">
                    <?php } ?>
                </fieldset>
                <button type="submit" class="btn-primary btn-large">작성</button>
            </div>
        </div>

        <div class="right-side">
            <h3 class="receipt-list-title">지출 내역</h3>
            <ul class="receipt-list">

<?php
                foreach($article->getReceipts() as $receipt){
?>
                <li class="receipt-list-item">
                    <input type="text" class="summary" name="summary[]" placeholder="지출 내역을 기입할 수 있습니다. (예. 기차 티켓 구매)" value="<?= $receipt->getSummary();?>"/>
                    <div class="pull-right">
                        <select name="currency[]">
                            <?php
                            if($receipt->getCurrency() == "krw") {
                                ?>
                                <option value="krw" selected>KRW(원)</option>
                                <option value="use">USD(달러)</option>
                                <?php
                            }
                            else {
                                ?>
                                <option value="krw">KRW(원)</option>
                                <option value="usd" selected>USD(달러)</option>
                                <?php
                            }
                            ?>
                        </select>
                        <span class="price-prefix"></span>
                        <input type="text" name="price[]" value="<?= $receipt->getPrice();?>"/>
                        <span class="price-postfix"></span>
                    </div>
                </li>
<?php } ?>
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
    
</script>

<?php include "footer.php" ?>
