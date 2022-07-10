<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Traits;


/**
 * Trait Search.
 */
trait Search
{

    
    public $array_filters = [];
    /**
     * The initial search string.
     *
     * @var string
     */
    public $search = '';

    /**
     * Method to search by: debounce or lazy.
     * @var string
     */
    public $searchUpdateMethod = 'debounce';

    /**
     * Whether or not searching is enabled.
     *
     * @var bool
     */
    public $searchEnabled = true;

    /**
     * false = disabled
     * int = Amount of time in ms to wait to send the search query and refresh the table.
     *
     * @var int
     */
    public $searchDebounce = 350;

    /**
     * A button to clear the search box.
     *
     * @var bool
     */
    public $clearSearchButton = true;

    /**
     * Resets the search string.
     */
    public function clearSearch()
    {
        $this->search = '';
    }
}
