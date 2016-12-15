<div id="artistList">
    <h3>Most popular artist in <?= $country ?></h3>
    <table>
    <?php foreach ($artists as $artist): ?>
        <tr>
            <td class="artistName"><?= $artist ?></td>
            <td class="artistImage">
                <?= \Includes\Helpers::printLink(
                        $artist->url,
                        \Includes\Helpers::printImg($artist->getImage()),
                        array('target' => '_blank'))?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>