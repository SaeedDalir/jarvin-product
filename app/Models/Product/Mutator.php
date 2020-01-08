<?php namespace App\Models\Product;

use App\Services\Helpers\SlugHandler;

trait Mutator
{
    public function setPersianNameAttribute($value): void
    {
        $this->attributes['persian_name'] = str_replace('ي', 'ی', $value);
        $this->setPersianSlugAttribute($value);
    }

    public function setEnglishNameAttribute($value): void
    {
        $this->attributes['english_name'] = $value;
        $this->setEnglishSlugAttribute($value);
    }

    public function setPersianSlugAttribute($value): void
    {
        $this->attributes['persian_slug'] = (new SlugHandler())->slugify($value);
    }

    public function setEnglishSlugAttribute($value): void
    {
        $this->attributes['english_slug'] = (new SlugHandler())->slugify($value);
    }
}
