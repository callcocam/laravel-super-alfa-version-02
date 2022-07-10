<?php

namespace SIGA\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class Language extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function slugTo()
    {
        return false;
    }

    public static function getTranslationsForGroup(string $locale, string $group): array
    {

        return Cache::rememberForever(static::getCacheKey($group, $locale), function () use ($group, $locale) {
            $language = static::query()
                ->where('name', $locale)
                ->first();
            if (!$language) return [];

            return $language->traductions;
        });
    }


    public static function getCacheKey(string $group, string $locale): string
    {
        return "spatie.translation-loader.{$group}.{$locale}";
    }

    public function traductions()
    {
        return $this->hasMany(Traduction::class);
    }
}
