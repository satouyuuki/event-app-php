<?php
namespace Application\utility;

class Utility {
    function h($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
}