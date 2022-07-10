<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Translations\TranslationLoaders;


interface TranslationLoader
{
    /**
     * Returns all translations for the given locale and group.
     *
     * @param string $locale
     * @param string $group
     *
     * @return array
     */
    public function loadTranslations(string $locale, string $group): array;
}
