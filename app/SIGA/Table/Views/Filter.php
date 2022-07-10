<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Views;


use App\SIGA\Attributes;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use SIGA\Table\Views\Traits\CanBeHidden;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Filter.
 */
class Filter
{
    use CanBeHidden;

    /**
     * @var string
     */
    protected $view = "default";

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
     * @var
     */
    protected $formatCallback;

    /**
     * The raw array of attributes.
     *
     * @var array
     */
    protected $options = [];

    /**
     * Filter constructor.
     *
     * @param string $text
     * @param string|null $attribute
     */
    public function __construct(string $text, ?string $attribute)
    {
        $this->text = $text;
        $this->attribute = sprintf("array_filters.%s",$attribute ?? Str::snake(Str::lower($text)));
    }

    
    /**
     * @param string $text
     * @param string|null $attribute
     *
     * @return Filter
     */
    public static function make(string $text, ?string $attribute = null): Filter
    {
        return new static($text, $attribute);
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return view_table_include(sprintf("filters.%s",$this->view));
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
    public function isView(): bool
    {
        return $this->view ? true : false;
    }

    /**
     * @param callable $callable
     *
     * @return $this
     */
    public function format(callable $callable): Filter
    {
        $this->formatCallback = $callable;

        return $this;
    }

    /**
     * @param $model
     * @param $Filter
     *
     * @return mixed
     */
    public function formatted($model, $Filter)
    {
        return app()->call($this->formatCallback, ['model' => $model, 'Filter' => $Filter]);
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

    
    public function model(Builder $model, $label="name", $id="id")
    {

        $this->options = $model->pluck( $label, $id)->toArray();
        return $this;
    }

    
    /**
     * @param $options
     * @param bool $finished
     * @return Filter
     */
    public function options($options, $finished = false)
    {

        if ($finished) {
            $this->options = $options;

            return $this;
        }
        $this->options = Arr::isAssoc($options) ? array_flip($options) : array_combine($options, $options);

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
