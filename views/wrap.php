<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: 'Предыдущий',
            nextText: 'Следующий',
            currentText: 'Сегодня',
            monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
            dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
            dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
            dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            weekHeader: 'Не',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };

        $.datepicker.setDefaults($.datepicker.regional['ru']);
        $( "#birthday" ).datepicker();
    });
    function setLetter(subm = 0) {
        $.ajax({
            url: '/?setTmlm',
            method: 'post',
            dataType: 'text',
            data: {
                mail_signature: $('#mail_signature').val(),
                mail_template: $('#mail_template').val(),
                people_ids: $('#people_ids').val(),
                send: subm
            },
            success: function (data) {
                $('#mail_create').html(data);
                if(subm == 1){
                    alert('Письмо отправлено');
                }
            }
        });
    }
</script>
<style>
    .red, .red a {
        color: red;
    }
    .green, .green a {
        color: green;
    }

    .wplogin{
        padding: 20px;
        border: 3px solid #aaee3f;
        border-radius: 50%;
        width: 200px;
        height: 200px;
        position: absolute;
        margin-left: -110px;
        left: 50%;
        margin-top: -110px;
        top: 50%;
        text-align: center;
    }

    .lcreate{
        padding: 20px;
        border: 3px solid #aaee3f;
        border-radius: 50%;
        width: 200px;
        height: 200px;
        position: absolute;
        margin-left: -110px;
        left: 50%;
        margin-top: -110px;
        top: 50%;
        text-align: center;
    }

    body {
        margin: 0;
        padding: 0;
    }

    .cred {
        color: #d00 !important;
    }

    .cyellow {
        color: yellow !important;
    }

    .wrLinks {
        height: 150px;
        width: 100%;
        overflow-y: scroll;
    }

    .tabLinks {
        color: #fff;
        background: #000;
        border-radius: 0 0 10px 10px;
        padding: 5px;
    }

    .tabLinks a {
        color: #aaee3f;
    }

    .pcreate {
        width: 500px;
        position: absolute;
        left: 50%;
        margin-left: -250px;
        padding: 20px;
        border: 3px solid #aaee3f;
        border-radius: 0 0 15px 15px;
    }

    .pcreate input {
        margin-top: 5px;
    }

    .pcreate select {
        margin-top: 5px;
    }

</style>
<?= $dadmin['fname'].' '.$dadmin['sname']?>
<?= $lshow?>
<?= $plogin?>
<?= $lcreate?>
<?= $ledit?>
<?= $pcreate?>
<?php //= $pmail?>
