<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
return [

    /*
     * Language lines will be fetched by these loaders. You can put any class here that implements
     * the SIGA\Translations\TranslationLoaders\TranslationLoader-interface.
     */
    'translation_loaders' => [
        \SIGA\Translations\TranslationLoaders\Db::class,
    ],

    /*
     * This is the model used by the Db Translation loader. You can put any model here
     * that extends SIGA\Translation.
     */
    'model' => \SIGA\Models\Language::class,

    /*
     * This is the translation manager which overrides the default Laravel `translation.loader`
     */
    'translation_manager' => SIGA\Translations\TranslationLoaderManager::class,

];
