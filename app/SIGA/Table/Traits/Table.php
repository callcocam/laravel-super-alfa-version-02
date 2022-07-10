<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Traits;


use App\SIGA\Attributes;

/**
 * Trait Table.
 */
trait Table
{
    /**
     * Whether or not to display the table header.
     *
     * @var bool
     */
    public $theme = 'tailwind';

    /**
     * Whether or not to display the table header.
     *
     * @var string
     */
    public $view_edit = 'edit';

    /**
     * Whether or not to display the table header.
     *
     * @var string
     */
    public $view_delete = 'delete';

    /**
     * Whether or not to display the table header.
     *
     * @var bool
     */
    public $tableHeaderEnabled = true;

    /**
     * Whether or not to display the table footer.
     *
     * @var bool
     */
    public $tableFooterEnabled = false;

    /**
     * The class to set on the table.
     *
     * @var string
     */
    public $tableClass = 'table align-items-center table-flush';


    /**
     * The class to set on the thead of the table.
     *
     * @var string
     */
    public $tableHeaderClass = 'thead-light';

    /**
     * The class to set on the tfoot of the table.
     *
     * @var string
     */
    public $tableFooterClass = '';

    /**
     * false is off
     * string is the tables wrapping div class.
     *
     * @var bool
     */
    public $responsive = 'table-responsive';

    /**
     * @param $attribute
     *
     * @return string|null
     */
    public function setTableHeadClass($attribute): ?string
    {
        return config(sprintf('laravel-livewire-tables.%s.classes.th', $this->theme), null);
    }

    /**
     * @param $attribute
     *
     * @return string|null
     */
    public function setTableHeadId($attribute): ?string
    {
        return $attribute;
    }

    /**
     * @param $attribute
     *
     * @return array|null
     */
    public function setTableHeadAttributes($attribute): array
    {

        return [];
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function setTableRowClass($model): ?string
    {
        return config(sprintf('laravel-livewire-tables.%s.classes.tr', $this->theme), null);
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function setTableRowId($model): ?string
    {
        return null;
    }

    /**
     * @param $model
     *
     * @return array
     */
    public function setTableRowAttributes($model): array
    {

        return [];
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function getTableRowUrl($model): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return string|null
     */
    public function setTableDataClass($attribute, $value): ?string
    {
        return [];
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return string|null
     */
    public function setTableDataId($attribute, $value): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return array
     */
    public function setTableDataAttributes($attribute, $value): array
    {
        return [];
    }

    public function visible($model)
    {
        return true;
    }

    /**
     * Merge additional attributes / values into the attribute bag.
     *
     * @param array $attributeDefaults
     * @param bool $escape
     * @return static
     */
    public function merge(array $attributeDefaults = [], $escape = true)
    {
        $attributes = new Attributes([]);

        return $attributes->merge($attributeDefaults, $escape);
    }
}
