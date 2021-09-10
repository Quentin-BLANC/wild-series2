<?php

namespace App\Service;

use Symfony\Component\String\Slugger\AsciiSlugger;

class Slugify
{
    public function generate(string $input) : string
    {
        $slugger = new AsciiSlugger();
        $slug = $slugger->slug($input);
        $slug = strtolower($slug);
        return $slug;
    }
}
