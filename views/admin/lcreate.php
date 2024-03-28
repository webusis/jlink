<div class="lcreate">
    <form action="?lcreate" method="post">
        <h2>GoFromTo</h2>
        To: <input name="olink" value="<?= (isset($_POST['olink'])) ? $_POST['olink'] : ''?>"><?= (isset($errors['olink'])) ? $errors['olink'] : ''?>
        From: <input name="tlink" value="<?= (isset($_POST['tlink'])) ? $_POST['tlink'] : ''?>"><?= (isset($errors['tlink'])) ? $errors['tlink'] : ''?>
        <input name="lcreate" type="submit" value="Добавить">
    </form>
</div>