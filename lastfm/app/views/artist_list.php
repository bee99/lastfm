<div id="artistList">
<?php foreach ($artists as $artist): ?>
    <div id="artistName"><?= $artist ?></div>
    <div id="artistImage">
        <a href="<?= $artist->getProperty('url') ?>" target="_blank">
            <img src="<?= $artist->getImage() ?>" alt="<?= $artist ?>">
        </a>
    </div>
<?php endforeach; ?>
</div>