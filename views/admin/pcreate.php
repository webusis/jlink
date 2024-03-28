<div class="pcreate">
<form method="post" action="?pcreate">
    <h2>GoFromTo</h2>
    Имя <input name="fname" value="<?= (isset($_POST['fname'])) ? $_POST['fname'] : ''?>"><?= (isset($errors['fname'])) ? $errors['fname'] : ''?><br>
    Фамилия <input name="sname" value="<?= (isset($_POST['sname'])) ? $_POST['sname'] : ''?>"><?= (isset($errors['sname'])) ? $errors['sname'] : ''?><br>
    День рождения <input id="birthday" name="birthday" value="<?= (isset($_POST['birthday'])) ? $_POST['birthday'] : ''?>"><?= (isset($errors['birthday'])) ? $errors['birthday'] : ''?><br>
    Пол <select name="gender">
        <option value="1">Мужской</option>
        <option value="0">Женский</option>
    </select><br>
    Город <input name="city" value="<?= (isset($_POST['city'])) ? $_POST['city'] : ''?>"><?= (isset($errors['city'])) ? $errors['city'] : ''?><br>
    Телефон в формате +375255357505 <input name="phone" value="<?= (isset($_POST['phone'])) ? $_POST['phone'] : ''?>"><?= (isset($errors['phone'])) ? $errors['phone'] : ''?><br>
    E-mail <input name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : ''?>"><?= (isset($errors['email'])) ? $errors['email'] : ''?><br>
    Пароль <input name="password" value="<?= (isset($_POST['password'])) ? $_POST['password'] : ''?>"><?= (isset($errors['password'])) ? $errors['password'] : ''?><br>
    <input name="save" type="submit" value="Добавить">
</form>
</div>