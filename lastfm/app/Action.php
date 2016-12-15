<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App;
/**
 * Description of Action
 *
 * @author bee
 */
abstract class Action {
    
    public function __construct(array $params = []) {
        foreach ($params as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function render($template, $data = array()) {
        $path = __DIR__ . Config::getInstance()->views['path'] . $template . '.php';
        if (file_exists($path)) {
            extract($data);
            ob_start();
            include $path;
            return ob_get_clean();
        }
    }
}
