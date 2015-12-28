<?php
function strShorten($str, $length = 100, $end = '&#8230;')
    {
        if (strlen($str) > $length) {
            $str = substr(trim($str), 0, $length);
            $str = substr($str, 0, strlen($str) - strpos(strrev($str), ' '));
            $str = trim($str.$end);
        }
        return $str;
    }




    //to html entities;  assume content is in the "content" variable
