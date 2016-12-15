<?php
/**
 * File Helpers.php
 *
 */

namespace Includes;
use Config\Config;

/**
 * Class Helpers
 */
class Helpers
{
    /**
     * @param  string $template
     * @param  array  $data
     * @return string
     */
    public static function render($template, $data = array())
    {
        $path = __DIR__ . '/' . Config::getInstance()->views['path'] . $template . '.php';
        if (file_exists($path)) {
            extract($data);
            ob_start();
            include $path;
            return ob_get_clean();
        }
    }

    /**
     * @param  string $url
     * @param  array  $params
     * @param  string $text
     * @return string
     */
    public static function printLink($url, $text, array $params = [])
    {
        $pars = "";
        foreach ($params as $key => $value) {
            $pars .= $key . '=' . '"' . $value . '"';
        }
        return '<a href="' . $url . '"' . $pars . '>' . $text . '</a>';
    }

    /**
     * @param  string $imgSrc
     * @return string
     */
    public static function printImg($imgSrc)
    {
        return '<img src="' . $imgSrc . '">';
    }
}
