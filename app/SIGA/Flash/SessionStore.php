<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Flash;


interface SessionStore
{

    /**
     * @param $name
     * @param $values
     * @return mixed
     */
    public function flash($name, $values);
}
