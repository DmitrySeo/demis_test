$(document).ready(function () {

    function renderBlock() {
        $.ajax({
            type: "GET",
            url: '../../actions/get_feedbacks.php',
            dataType: 'JSON',
            success: function (response) {
                $("#tbody").html('')
                if(response == "no data"){
                    tr_str = "<tr><td colspan='4' style='text-align: center'>Данные отсутствуют</td></tr>"
                    $("#tbody").append(tr_str);
                } else {
                    for (let i = 0; i < response.length; i++) {
                        tr_str = "<tr><td>" + response[i].user_name + "</td><td>" + response[i].user_address + "</td><td>" + response[i].user_phone + "</td><td>" + response[i].user_email + "</td></tr>"
                        $("#tbody").append(tr_str);
                    }
                }

            }
        })
    }

    renderBlock()

    $("form#feedback_form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '../../actions/send_form.php',
            data: $(this).serialize(),
            beforeSend: function () {
                let empty = $('form#feedback_form').find(".required").filter(function () {
                    return this.value === "";
                });
                if (empty.length) {
                    $('.errors').html('Заполните все поля')
                    for (let i = 0; i < empty.length; i++) {
                        $('#'+empty[i].id).addClass("red");
                    }
                    return false;
                } else {
                    $('.errors').html('')
                    return true;
                }
            },
            success: function (response) {
                result = $.parseJSON(response);
                if (result == 'success') {
                    $('#user_name').val('')
                    $('#user_address').val('')
                    $('#user_phone').val('')
                    $('#user_email').val('')
                    $('.success').html('Данные добавлены').delay(2000).hide(0);
                    renderBlock()
                }
            }
        })
    })
});