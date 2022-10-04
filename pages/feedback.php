<?php
$title = 'Обратная связь';

include_once $_SERVER['DOCUMENT_ROOT'] . "/tpl/header.php";

?>

<div class="container">

    <div class="row">
        <?include_once $_SERVER['DOCUMENT_ROOT'] . "/tpl/navbar.php";?>

        <div class="flex-container">
            <form class="form-container" id="feedback_form">
                <div class="errors"></div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">ФИО <span style="color:red">*</span></label>
                    <input type="text" class="form-control required" id="user_name" name="user_name">
                </div>
                <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label">Адрес <span style="color:red">*</span></label>
                    <input type="text" class="form-control required" id="user_address" name="user_address">
                </div>
                <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label">Телефон <span style="color:red">*</span></label>
                    <input type="text" class="form-control required" id="user_phone" name="user_phone">
                </div>
                <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label">Email <span style="color:red">*</span></label>
                    <input type="text" class="form-control required" id="user_email" name="user_email">
                </div>
                <div class="button-block">
                    <button type="submit" class="btn" id="send">Отправить</button>
                </div>
                <div class="success"></div>
            </form>

        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Адресс</th>
                <th scope="col">Телефон</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>

    </div>

</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/tpl/footer.php";
?>

