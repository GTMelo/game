<?php

namespace App\Models\FormBuilder;

use App\Exceptions\FormBuilderException;

class FormBuilder implements IBuildable
{
    private $content, $properties, $classes;

    public static function new(): FormBuilder
    {
        $f = new FormBuilder();
        $f->content = collect([]);
        $f->properties = collect([]);
        $f->classes = '';
        return $f;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setProperty($property, $value)
    {
        $this->properties->put($property, $value);
        return $this;
    }

    public function get($key)
    {
        return $this->getProperties()->get($key);
    }

    public function setId($id)
    {
        return $this->setProperty('id', $id);
    }

    public function setName($name)
    {
        return $this->setProperty('name', $name);
    }

    public function setAction($action)
    {
        return $this->setProperty('action', $action);
    }

    public function setMethod($method = 'POST')
    {
        return $this->setProperty('method', strtoupper($method));
    }

    public function setAutocomplete()
    {
        return $this->setProperty('autocomplete', 'on');
    }

    public function setHasFileUpload()
    {
        $method = $this->get('method');
        if ($method != 'POST') report(new FormBuilderException('Tried to add enctype to a ' . $method . ' form.'));
        return $this->setProperty('enctype', 'multipart/form-data');
    }

    public function setTarget($target)
    {
        return $this->setProperty('target', $target);
    }

    public function build()
    {
        $properties = '';
        foreach ($this->getProperties() as $key => $property) {
            $properties .= "$key=\"$property\" ";
        }
        $result = $this->properties->isEmpty() ?'<form': '<form ';
        $result .= trim($properties);
        $result .= '>';
        $result .= $this->buildContent();
        $result .= '</form>';
        return $result;
    }

    public function addClass($class)
    {
        if (!$this->get('class')) return $this->setProperty('class', $class);
        return $this->setProperty('class', $this->get('class') . ' ' . $class);
    }

    public function addFieldset(FieldsetBuilder $fieldset)
    {
        $this->content->push($fieldset);
        return $this;
    }

    public function addInput(FieldBuilder $input){
        $this->content->push($input);
        return $this;
    }

    private function buildContent()
    {
        $result = '';
        if ($this->content) {
            foreach ($this->content as $item) {
                $result .= $item->build();
            }
        }
        return $result;
    }
}
