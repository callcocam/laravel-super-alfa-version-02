<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Views;


use App\SIGA\Attributes;
use Illuminate\Support\Str;
use SIGA\Table\Views\Traits\CanBeHidden;

/**
 * Class Column.
 */
class Column
{
    use CanBeHidden;

    /**
     * @var string
     */
    protected $view;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $colspan;

    /**
     * @var string
     */
    protected $width;

    /**
     * @var string
     */
    protected $attribute;

    /**
     * The raw array of attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * @var bool
     */
    protected $sortable = false;

    /**
     * @var bool
     */
    protected $searchable = false;

    /**
     * @var bool
     */
    protected $raw = false;

    /**
     * @var bool
     */
    protected $includeInExport = true;

    /**
     * @var bool
     */
    protected $exportOnly = false;

    /**
     * @var
     */
    protected $formatCallback;

    /**
     * @var
     */
    protected $exportFormatCallback;

    /**
     * @var
     */
    protected $sortCallback;

    /**
     * @var null
     */
    protected $searchCallback;

    /**
     * @var bool
     */
    protected $btn_finish = false;

    /**
     * Column constructor.
     *
     * @param string $text
     * @param string|null $attribute
     */
    public function __construct(string $text, ?string $attribute)
    {
        $this->text = $text;
        $this->attribute = $attribute ?? Str::snake(Str::lower($text));
    }

    /**
     * @param string $text
     * @param string|null $attribute
     *
     * @return Column
     */
    public static function make(string $text, ?string $attribute = null): Column
    {
        return new static($text, $attribute);
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return view_table_include($this->view);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * @return array
     */

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function __get($name)
    {
        return $this->{$name};
    }


    public function btn_finish($btn_finish = true)
    {
        $this->btn_finish = $btn_finish;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSortCallback()
    {
        return $this->sortCallback;
    }

    /**
     * @return mixed
     */
    public function getSearchCallback()
    {
        return $this->searchCallback;
    }

    /**
     * @return bool
     */
    public function isFormatted(): bool
    {
        return is_callable($this->formatCallback);
    }

    /**
     * @return bool
     */
    public function hasExportFormat(): bool
    {
        return is_callable($this->exportFormatCallback);
    }

    /**
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->sortable === true;
    }

    /**
     * @return bool
     */
    public function isSearchable(): bool
    {
        return $this->searchable === true;
    }

    /**
     * @return bool
     */
    public function isRaw(): bool
    {
        return $this->raw === true;
    }

    /**
     * @return bool
     */
    public function isView(): bool
    {
        return $this->view ? true : false;
    }

    /**
     * @param callable $callable
     *
     * @return $this
     */
    public function format(callable $callable): Column
    {
        $this->formatCallback = $callable;

        return $this;
    }

    /**
     * @param callable $callable
     *
     * @return $this
     */
    public function exportFormat(callable $callable): Column
    {
        $this->exportFormatCallback = $callable;

        return $this;
    }

    /**
     * @param $model
     * @param $column
     *
     * @return mixed
     */
    public function formatted($model, $column)
    {
        return app()->call($this->formatCallback, ['model' => $model, 'column' => $column]);
    }

    /**
     * @param $model
     * @param $column
     *
     * @return mixed
     */
    public function formattedForExport($model, $column)
    {
        return app()->call($this->exportFormatCallback, ['model' => $model, 'column' => $column]);
    }

    /**
     * @param callable|null $callable
     *
     * @return $this
     */
    public function sortable(callable $callable = null): self
    {
        $this->sortCallback = $callable;
        $this->sortable = true;

        return $this;
    }

    /**
     * @param callable|null $callable
     *
     * @return $this
     */
    public function searchable(callable $callable = null): self
    {
        $this->searchCallback = $callable;
        $this->searchable = true;

        return $this;
    }

    /**
     * @param $view
     * @return $this
     */
    public function view($view): self
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @param $colspan
     * @return $this
     */
    public function colspan($colspan): self
    {
        $this->colspan = $colspan;

        return $this;
    }

    /**
     * @param $width
     * @return $this
     */
    public function width($width): self
    {
        $this->attributes['width'] = $width;

        return $this;
    }

    /**
     * @return $this
     */
    public function raw(): self
    {
        $this->raw = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function includedInExport(): bool
    {
        return $this->includeInExport === true;
    }

    /**
     * @return $this
     */
    public function exportOnly(): self
    {
        $this->hidden = true;
        $this->exportOnly = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isExportOnly(): bool
    {
        return $this->exportOnly === true;
    }

    /**
     * @return $this
     */
    public function excludeFromExport(): self
    {
        $this->includeInExport = false;

        return $this;
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
        $attributes = new Attributes($this->attributes);

        return $attributes->merge($attributeDefaults, $escape);
    }
}
