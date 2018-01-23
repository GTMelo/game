<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 22/01/2018
 * Time: 17:37
 */

namespace App\Models\FormBuilder;


class FieldBuilder implements IBuildable
{

    protected $type, $properties, $options;

    public static function new($type = null): FieldBuilder
    {
        $f = new FieldBuilder();
        $f->type = $type;
        $f->properties = collect([]);
        $f->options = collect([]);
        return $f;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param mixed $properties
     */
    public function setProperty($key, $value)
    {
        $this->properties->put($key, $value);
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    public function addOption($key, $value){
        $this->options->put($key, $value);
    }

    public function build()
    {
        if($this->type == 'text') return $this->buildAsText();
        if($this->type == 'password') return $this->buildAsPassword();
        if($this->type == 'select') return $this->buildAsSelect();
        return '<input>';
    }

    private function buildAsText(){
        return '<input type="text">';
    }

    private function buildAsPassword(){
        return '<input type="password">';
    }

    private function buildAsSelect(){
        $result = '<select>';
        foreach($this->options as $key => $option){
            $result .= "<option value=\"$key\">$option</option>";
        }
        $result .='</select>';
        return $result;
    }

    // TODO finish kinds of input
    // TODO add properties
    // TODO form can be generated from json?
}