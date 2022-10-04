<?php

$title = 'Новости';

include_once $_SERVER['DOCUMENT_ROOT'] . "/tpl/header.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

$getAllNews = getNews();



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
                        <p class="card-text"><?=getSentence($news['text'],2)?></p>
                        <p class="card-date"><?=date("d.m.Y",strtotime($news['timestamp']))?></p>
                    </div>
                </div>
        <?
            endforeach;
        endif;
        ?>
    </div>
</div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/tpl/footer.php";
?>
