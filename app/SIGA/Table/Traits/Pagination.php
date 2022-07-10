<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Traits;


/**
 * Trait Pagination.
 */
trait Pagination
{
    /**
     * Displays per page and pagination links.
     *
     * @var bool
     */
    public $paginationEnabled = true;

    /**
     * The options to limit the amount of results per page.
     *
     * @var array
     */
    public $perPageOptions = [12, 25, 50];

    /**
     * Amount of items to show per page.
     *
     * @var int
     */
    public $perPage = 12;

    /**
     * https://laravel-livewire.com/docs/pagination
     * Resetting Pagination After Filtering Data.
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * https://laravel-livewire.com/docs/pagination
     * Resetting Pagination After Changing the perPage.
     */
    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function loadmore()
    {
        $this->perPage += 5;
    }
    public function resetPerPage()
    {
        $this->perPage = 6;
    }
}
