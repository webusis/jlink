<div class="lcreate">
    <form action="?ledit=<?= $dlink['tlink']?>" method="post">
        <h2>GoFromTo</h2>
        To: <input name="olink" value="<?= (isset($dlink['olink'])) ? $dlink['olink'] : ''?>"><?= (isset($errors['olink'])) ? $errors['olink'] : ''?>
        From: <input name="tlink" value="<?= (isset($dlink['tlink'])) ? $dlink['tlink'] : ''?>"><?= (isset($errors['tlink'])) ? $errors['tlink'] : ''?>
        <input name="ledit" type="submit" value="Обновить">
    </form>
</div>