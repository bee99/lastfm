<?php
/**
 * File LastfmSearch.php
 */

namespace Lib\Lastfm;

use \Config\Config;

/**
 * Class LastfmSearch
 */
class LastfmSearch extends \Lib\Lastfm
{

    /**
     * @param array $params
     */
    public function __construct(Config $config, array $params = [])
    {
        $this->page_size = $config->lastFm['page_size'];
        $this->page = isset($params['page_number']) ? (int)$params['page_number'] : 1;
        parent::__construct($config, $params);
    }

    /**
     *
     */
    protected function setMethod()
    {
        $this->method = 'geo.gettopartists';
    }

    /**
     * @param null $query
     * @return array
     */
    public function run($query = null)
    {
        $keyword = filter_var($query, FILTER_SANITIZE_MAGIC_QUOTES);
        $params = [
            'country' => $keyword,
            'limit' => $this->page_size,
            'page' => $this->page
        ];
        $lastfmArtists = [];
        $xmlResult = simplexml_load_string(file_get_contents($this->buildUrl($params)));
        $attributes = $xmlResult->topartists->attributes();
        $this->setAttributes(reset($attributes));
        foreach ($xmlResult->topartists->artist as $artist) {
            $lastfmArtists[] = new \Lib\LastfmArtist($artist);
        }
        return $lastfmArtists;
    }

    /**
     * @param array $attributes
     */
    private function setAttributes(array $attributes = [])
    {
        foreach ($attributes as $attr => $value) {
            if ($this->isValidAttr($attr)) {
                $this->$attr = $value;
            }
        }
    }

    /**
     * @param string $attr
     * @return bool
     */
    private function isValidAttr($attr)
    {
        return in_array($attr, ['page', 'perPage', 'total', 'totalPages']);
    }

    /**
     * @return array
     */
    public function getPaginationData()
    {
        $data = array(
            'page' => $this->page,
            'perPage' => $this->perPage,
            'total' => $this->total,
            'totalPages' => $this->totalPages
        );
        return $data;
    }
}
