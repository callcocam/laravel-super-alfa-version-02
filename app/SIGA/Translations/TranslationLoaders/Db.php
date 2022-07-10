<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Translations\TranslationLoaders;


use SIGA\Models\Language;
use SIGA\Translations\Exceptions\InvalidConfiguration;

class Db implements TranslationLoader
{

    public function loadTranslations(string $locale, string $group): array
    {
        $model = $this->getConfiguredModelClass();

        return $model::getTranslationsForGroup($locale, $group);
    }

    protected function getConfiguredModelClass(): string
    {
        $modelClass = config('translation-loader.model');

        if (! is_a(new $modelClass, Language::class)) {
            throw InvalidConfiguration::invalidModel($modelClass);
        }

        return $modelClass;
    }
}
