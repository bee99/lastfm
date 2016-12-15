<?php
/**
 * File index.php
 */

require_once __DIR__ . '/../config/Config.php';
use Config\Config;
use Lib\Lastfm;

$config = Config::getInstance();

$content = "";
$content .= \Includes\Helpers::render('templates/header');
$content .= \Includes\Helpers::render('templates/search-form');

$keyword = filter_input(INPUT_GET, 'keyword');
if (!empty($keyword)) {
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ? : 1;
    $lastFm = new Lastfm\LastfmSearch($config, ['page_number' => $page]);
    $content .= \Includes\Helpers::render(
        'templates/list',
        ['artists' => $lastFm->run($keyword), 'country' => $keyword]
    );
    $paginationData = $lastFm->getPaginationData();
    $content .= \Includes\Helpers::render(
        'templates/pager',
        [
            'page' => $page,
            'totalPages' => $paginationData['totalPages'],
            'keyword' => $keyword
        ]
    );
}

$content .= \Includes\Helpers::render('templates/footer');

echo \Includes\Helpers::render('template', ['content' => $content]);