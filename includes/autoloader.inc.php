<?php

spl_autoload_register(function($className) {

  $path = 'classes/';
  $ext = '.class.php';
  $fullpath = $path . $className . $ext;

  if(empty($fullpath)){
    return false;
  }
  include($fullpath);

});