<?php namespace App\Services\Helpers;

class SlugHandler
{
    public function slugify(string $text)
    {
        return preg_replace('/\s+/u','-',trim($text));
    }
}
