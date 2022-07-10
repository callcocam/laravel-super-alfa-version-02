<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

if (!function_exists('flash')) {
    /**
     * Arrange for a normal, session-based flash message.
     *
     * @param  string|null $message
     * @param  string      $level
     * @return \SIGA\Flash\Notifier
     */
    function flash($message = null, $level = "info")
    {
        /**
         * @var $notifier \SIGA\Flash\Notifier
         */
        $notifier = app('flash');

        if (! is_null($message)) {
            return $notifier->message($message, $level);
        }

        return $notifier;
    }
}
