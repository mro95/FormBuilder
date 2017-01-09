<?php
namespace spec\Mro95\FormBuilder;

use Mro95\FormBuilder\Form;
use Mro95\FormBuilder\ViewInterface;
use PhpSpec\ObjectBehavior;

class FormSpec extends ObjectBehavior
{
    public function let(ViewInterface $view)
    {
        $this->beConstructedWith($view);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Form::class);
    }

    public function it_can_add_fields()
    {
        $this->addField("test", ['foo' => 'bar']);
        $this->getFields()->shouldBe([
           "test" => [
               'foo' => 'bar'
           ]
        ]);
    }

    public function it_can_format_to_html()
    {
        
    }
}