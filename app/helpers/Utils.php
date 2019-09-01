<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 27/06/19
 * Time: 22:21
 */

namespace helpers;

class Utils
{
    public function translate($string) {}
    public function encode($string) {}
    public function decode($string) {}
    public static function upper($var){

        if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $var, $match)){

            return "//www.youtube.com/embed/".$match[1];
        }
        return "//www.youtube.com/embed/ydOzNsRQwUM";
    }

    /*
     *
     * $newValue = $this->utils->translate($oldValue);
     *
     *
     * $utils = \Phalcon\Di::getDefault()->get('utils'); MODEL
     */
}