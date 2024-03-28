
<hr>
Удалить
<form method="post" action="/">
    ID <input name="id" value=""><br>
    <input name="delete" type="submit" value="Удалить">
</form>

<hr>
<select id="people_ids" multiple name="people_ids[]" onchange="setLetter()">
    <?php foreach($people as $k => $p):?>
        <option value="<?= $p['id']?>"><?= $p['fname'].' '.$p['sname']?></option>
    <?php endforeach;?>
</select>
Шаблон писма
<select id="mail_template" name="mail_template" onchange="setLetter()">
    <option value="0">Первый шаблон</option>
    <option value="1">Второй шаблон</option>
</select>
Шаблон подписи
<select id="mail_signature" name="mail_signature" onchange="setLetter()">
    <option value="0">Красный</option>
    <option value="1">Зеленый</option>
</select>
<hr>
<div id="mail_create">
    <?= $mail_create?>
</div>
<button onclick="setLetter(1)">Отправить</button>