<?php

namespace App\Services;

class Sanitizer
{
    public function sanitize($message){
        return htmlspecialchars(strip_tags($message));
    }
}