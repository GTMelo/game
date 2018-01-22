<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 22/01/2018
 * Time: 17:08
 */

namespace App\Models\FormBuilder;


class FieldsetBuilder implements IBuildable
{
    private $legend;

    public static function new(): FieldsetBuilder
    {
        return new FieldsetBuilder();
    }

    public function build(){

        $r = '<fieldset>';
        if($this->legend) $r .= "<legend>$this->legend</legend>";
        $r .= '</fieldset>';
        return $r;

    }

    public function setLegend($string)
    {
        $this->legend = $string;
        return $this;
    }
}