<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Flash;


use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore
{
    /**
     * @var Store
     */
    private $session;

    /**
     * LaravelSessionStore constructor.
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function flash($name, $values)
    {
        $this->session->flash($name, $values);
    }
}
