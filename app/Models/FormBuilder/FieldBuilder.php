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

    public static function new(): FieldBuilder
    {
        return new FieldBuilder();
    }

    public function build()
    {
        return '<input>';
    }
}