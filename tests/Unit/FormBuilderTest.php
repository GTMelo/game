<?php

namespace Tests\Unit;

use App\Models\FormBuilder\FieldBuilder;
use App\Models\FormBuilder\FieldsetBuilder;
use App\Models\FormBuilder\FormBuilder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormBuilderTest extends TestCase
{
    /** @test
     * This test should check if: a form can be created
     */
    public function a_form_can_be_created()
    {
        $this->assertEquals('<form></form>', FormBuilder::new()->build());
    }

    /** @test
     * This test should check if: a form has optional properties
     */
    public function a_form_has_optional_properties()
    {
        $form = FormBuilder::new()->setProperty('foo', 'bar');
        self::assertEquals('bar', $form->get('foo'));
    }

    /** @test
     * This test should check if: a form will output with its existing properties set
     */
    public function a_form_will_output_with_its_existing_properties_set()
    {
        $form = FormBuilder::new()->setProperty('foo', 'bar');
        $form->setProperty('foo1', 'bar1');
        $this->assertEquals('<form foo="bar" foo1="bar1"></form>', $form->build());
    }

    /** @test
     * This test should check if: a form generates with helper methods
     */
    public function a_form_generates_with_helper_methods()
    {
        $form = FormBuilder::new()
            ->setMethod('post')
            ->setId('foo')
            ->setAction('/dothing')
            ->setName('namething')
            ->setTarget('_blank');
        $this->assertEquals('<form method="POST" id="foo" action="/dothing" name="namething" target="_blank"></form>', $form->build());
        $form->setAutocomplete();
        $this->assertContains('autocomplete="on"', $form->build());
        $form->setHasFileUpload();
        $this->assertContains('enctype="multipart/form-data"', $form->build());
    }

    /** @test
    * This test should check if: a form may have a class
    */
    public function a_form_may_have_a_class(){
        $form = FormBuilder::new()->addClass('thing');
        self::assertContains('class="thing"', $form->build());
        $form->addClass('thang');
        self::assertContains('class="thing thang"', $form->build());
    }

    /** @test
    * This test should check if: a fieldset can be created with optional legend
    */
    public function a_fieldset_can_be_created_with_optional_legend(){
        $field = FieldsetBuilder::new();
        self::assertEquals('<fieldset></fieldset>', $field->build());
        $field->setLegend('legend');
        self::assertEquals('<fieldset><legend>legend</legend></fieldset>', $field->build());
    }

    /** @test
    * This test should check if: a form may contain fieldsets
    */
    public function a_form_may_contain_fieldsets(){
        $form = FormBuilder::new();
        $form->addFieldset(FieldsetBuilder::new());
        self::assertEquals('<form><fieldset></fieldset></form>', $form->build());
        $form->addFieldset(FieldsetBuilder::new()->setLegend('Thing'));
        self::assertEquals('<fieldset><legend>Thing</legend></fieldset>', $form->getContent()[1]->build());
        self::assertEquals('<form><fieldset></fieldset><fieldset><legend>Thing</legend></fieldset></form>', $form->build());
    }

    /** @test
    * This test should check if: a generic input can be created
    */
    public function a_generic_input_can_be_created(){
        $field = FieldBuilder::new();
        self::assertEquals('<input>', $field->build());
    }

    /** @test
    * This test should check if: a form has inputs
    */
    public function a_form_has_inputs(){
        $form = FormBuilder::new();
        $input = FieldBuilder::new();
        $form->addInput($input);
        self::assertEquals('<form><input></form>', $form->build());
    }

    // TODO create stuff for inputs
    

}
