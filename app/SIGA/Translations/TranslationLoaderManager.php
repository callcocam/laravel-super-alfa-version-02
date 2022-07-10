<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Translations;


use SIGA\Translations\TranslationLoaders\TranslationLoader;
use Illuminate\Translation\FileLoader;

class TranslationLoaderManager extends FileLoader
{

    /**
     * Load the messages for the given locale.
     *
     * @param string $locale
     * @param string $group
     * @param string $namespace
     *
     * @return array
     */
    public function load($locale, $group, $namespace = null): array
    {


        $fileTranslations = parent::load($locale, $group, $namespace);

        if (!is_null($namespace) && $namespace !== '*') {
            return $fileTranslations;
        }

        $loaderTranslations = $this->getTranslationsForTranslationLoaders($locale, $group, $namespace);

        return array_merge($fileTranslations, $loaderTranslations);
    }

    protected function getTranslationsForTranslationLoaders(
        string $locale,
        string $group,
        string $namespace = null
    ): array {
        $results = collect(config('translation-loader.translation_loaders'))
            ->map(function (string $className) {
                return app($className);
            })
            ->mapWithKeys(function (TranslationLoader $translationLoader) use ($locale, $group, $namespace) {
                return $translationLoader->loadTranslations($locale, $group, $namespace);
            })
            ->toArray();
        return $results;
    }
}
