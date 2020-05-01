<?php
namespace Application\utility;

class Utility {
    function h($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

    function inputDateFormat($date) {
        return date('Y-m-d',  strtotime($date));
    }
}