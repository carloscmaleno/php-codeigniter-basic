<?php
 /**
  * File: functions_global.php
  *
  * PHP version 5
  *
  * @category File
  * @package  php-codeigniter-base
  * @author   Carlos Coronado <carlos.coronado@laviniainteractiva.com>
  * @date     23/09/15 17:54
  * @license  http://www.laviniainteractiva.com  PHP License
  * @link     http://www.laviniainteractiva.com
  */


function titleToUri($string)
{
    return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
}

function getTemplateImgUrl($img_file)
{
    return site_url('/assets/img/'.$img_file);
}

function getTemplateCssUrl($css_file){
    return site_url('/assets/css/'.$css_file);
}

function getTemplateJsUrl($js_file){
    return site_url('/assets/js/'.$js_file);
}


function rpHash($value)
{
    $hash = 5381;
    $value = strtoupper($value);
    for ($i = 0; $i < strlen($value); $i++) {
        $hash = (leftShift32($hash, 5) + $hash) + ord(substr($value, $i));
    }
    return $hash;
}

// Perform a 32bit left shift
function leftShift32($number, $steps)
{
    // convert to binary (string)
    $binary = decbin($number);
    // left-pad with 0's if necessary
    $binary = str_pad($binary, 32, "0", STR_PAD_LEFT);
    // left shift manually
    $binary = $binary.str_repeat("0", $steps);
    // get the last 32 bits
    $binary = substr($binary, strlen($binary) - 32);
    // if it's a positive number return it
    // otherwise return the 2's complement
    return ($binary{0} == "0" ? bindec($binary) :
        -(pow(2, 31) - bindec(substr($binary, 1))));
}
