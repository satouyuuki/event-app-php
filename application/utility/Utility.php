<?php
namespace Application\utility;

class Utility {
    public static function h($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

    public static function inputDateFormat($date) {
        return date('Y-m-d',  strtotime($date));
    }
}