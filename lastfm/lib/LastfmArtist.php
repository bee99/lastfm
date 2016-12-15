<?php
/**
 * File LastfmArtist.php
 *
 */

namespace Lib;

/**
 * Class LastfmArtist
 */
class LastfmArtist
{

    /**
     * @param \SimpleXMLElement $simpleXML
     */
    public function __construct(\SimpleXMLElement $simpleXML)
    {
        foreach (get_object_vars($simpleXML) as $key => $value) {
            if ($this->isValidKey($key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @param  $key
     * @return bool
     */
    public function isValidKey($key)
    {
        return
            in_array(
                $key,
                [
                    'name',
                    'listeners',
                    'mbid',
                    'url',
                    'streamable',
                    'image'
                ]
            );
    }

    /**
     * @param  string $property
     * @return mixed
     */
    public function getProperty($property)
    {
        if ($this->isValidKey($property)) {
            return $this->$property;
        }
    }

    /**
     * @param  int   $position
     * @return mixed
     */
    public function getImage($position = 0)
    {
        return $this->image[$position];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
