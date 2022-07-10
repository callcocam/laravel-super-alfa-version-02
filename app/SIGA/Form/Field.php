<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form;


use App\SIGA\Form\Traits\Attributes;

class Field extends BaseField
{

    use Attributes;
    public $wire_model = ".defer";
    protected $class = 'form-control';
    protected $sort  = false;

    /**
     * @param $label
     * @param null $name
     * @return static
     */
    public static function make($label, $name = null)
    {
        return new static($label, $name);
    }

    /**
     * @param null $name
     * @return static
     */
    public static function blank( $name)
    {
        $field = new static($name, null);
        $field->view('hiiden');
        return $field;
    }


    /**
     * @return $this
     */
    public function color()
    {
        $this->attribute('type', 'text');
        $this->view( 'color');
        return $this;
    }
       
    /**
     * @return $this
     */
    public function cover()
    {
        $this->attribute('type', 'file');
        $this->view( 'cover');
        $this->default = config("laravel-livewire-forms.default-no-image");
        return $this;
    }

    /**
     * @return $this
     */
    public function file_preview($span = "12")
    {
       return $this->file('file-review')->span($span);
    }
    /**
     * @return $this
     */
    public function file($file = 'file')
    {
        $this->class = sprintf("%s cursor-pointer", $this->class);
        $this->attribute('type', 'text');
        $this->attribute('style', 'cursor:pointer;');
        $this->attribute('readonly', true);
        $this->view($file);
        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function checkbox($options=[])
    {
        $this->options($options);
        $this->attribute('type', 'checkbox');
        $this->view('checkbox');
        return $this;
    }

    /**
     * @return $this
     */
    public function radio()
    {
        $this->view('radio');
        $this->attribute('type', 'radio');
        return $this;
    }

    /**
     * @return $this
     */
    public function password()
    {
        $this->attribute('type', 'password');
        return $this;
    }



    /**
     * @return $this
     */
    public function select()
    {
        $this->view('select');
        $this->attribute('type', null);
        return $this;
    }

    /**
     * @return $this
     */
    public function diveder($view='diveder')
    {
        $this->view($view);
        return $this;
    }


    /**
     * @return $this
     */
    public function sort()
    {
        $this->sort = true;
        return $this;
    }


    /**
     * @param array $fields
     * @return $this
     */
    public function array($fields = [])
    {
        $this->type = 'array';
        foreach ($fields as $key =>$field)
        {
            $field->key = sprintf("%s.%s", $this->key, $field->name);
            $this->array_fields[$key] = $field;
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function sortable()
    {
        $this->arry_sortable = true;
        return $this;
    }


}
