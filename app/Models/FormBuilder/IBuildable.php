<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 22/01/2018
 * Time: 17:10
 */

namespace App\Models\FormBuilder;


interface IBuildable
{
    public static function new();
    public function build();
}