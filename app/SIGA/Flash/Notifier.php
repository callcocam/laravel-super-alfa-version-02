<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Flash;


use Illuminate\Support\Traits\Macroable;
use Livewire\Component;

class Notifier
{
    use Macroable;
    /**
     * The session store.
     *
     * @var SessionStore
     */
    protected $session;
    /**
     * The messages collection.
     *
     * @var \Illuminate\Support\Collection
     */
    public $messages;

    /**
     * Notifier constructor.
     * @param SessionStore $session
     */
    public function __construct(SessionStore $session)
    {

        $this->session = $session;
        $this->messages = collect();
    }

    public function message($message = null, $level = null)
    {

        if (!$message) {
            return $this->updateLastMessage(compact('level'));
        }

        if (!$message instanceof Message) {

            $message = new Message(compact('message', 'level'));

        }
        $this->messages->push($message);

        return $this->flash();
    }

    public function livewire(Component $livewire)
    {
        $livewire->emit('flashMessageAdded', $this->messages->pop());

        $livewire->dispatchBrowserEvent('clearFlash');
        return $this;
    }

    protected function updateLastMessage($overrides = [])
    {
        $this->messages->last()->update($overrides);
        return $this;
    }

    public function overlay($message = null, $title = null)
    {

        if (!$message) {
            return $this->updateLastMessage(['title' => $title, 'overlay' => true]);
        }

        return $this->message(
            new Overlay(compact('title', 'message'))
        );
    }

    /**
     * @param bool $dismissable
     */
    public function dismissable($dismissable = true)
    {
              return $this->updateLastMessage(['dismissable' => $dismissable]);
    }

    /**
     * @param bool $confirm
     * @return Notifier
     */
    public function confirm($confirm = true)
    {
        return $this->updateLastMessage(['confirm' => $confirm]);
    }

    /**
     * @return $this
     */
    protected function flash()
    {

        $this->session->flash('flash_notification', $this->messages);

        return $this;
    }

    public function clear()
    {
        $this->messages = collect();
        return $this;
    }

}
