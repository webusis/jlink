<div class="wrLinks">
    <a href="?logout">Выход</a>
    <table class="tabLinks" align="center">
    <tr>
        <td><?= $clTr['olink']?></td>
        <td><?= $clTr['tlink']?></td>
        <td><?= $clTr['trlink']?></td>
        <td></td>
        <td></td>
    </tr>
    <?php foreach($links as $k => $p):?>
        <tr>
            <td><a href="<?= $p['olink']?>"><?= $p['olink']?></a></td>
            <td><a href="https://<?= $_SERVER['HTTP_HOST']?>/?gft=<?= $p['tlink']?>">https://<?= $_SERVER['HTTP_HOST']?>/?gft=<?= $p['tlink']?></a></td>
            <td><?= $p['trlink']?></td>
            <td><a class="cyellow" href="?ledit=<?= $p['tlink']?>">Редактировать</a></td>
            <td><a class="cred" href="?pldel=1&tlink=<?= $p['tlink']?>">X</a></td>
        </tr>
    <?php endforeach;?>
</table>
</div>