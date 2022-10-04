<?php

$title = 'Главная страница';

include_once $_SERVER['DOCUMENT_ROOT'] . "/tpl/header.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

$getAllNews = getLastNews();

?>

<div class="container">

    <div class="row">
        <?include_once $_SERVER['DOCUMENT_ROOT'] . "/tpl/navbar.php";?>

        <?
        if($getAllNews):
            foreach ($getAllNews as $news):?>
                <div class="card news">
                    <div class="card-body">
                        <h5 class="card-title"><?=$news['title']?></h5>
                        <p class="card-text"><?=getSentence($news['text'],1)?></p>
                        <p class="card-date"><?=date("d.m.Y",strtotime($news['timestamp']))?></p>
                    </div>
                </div>
            <?
            endforeach;
        endif;
        ?>
    </div>
    <p><a href="/pages/news.php" target="_blank">Все новости</a></p>
    <p><a href="/pages/feedback.php" target="_blank">Обратная связь</a></p>
</div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/tpl/footer.php";
?>
