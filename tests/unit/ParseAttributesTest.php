<?php
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Utility\Utility;
define('_JEXEC', 1);
class ParseAttributesTest extends TestCase
{
    protected $classFile;

    protected function setUp(): void
    {
        $this->classFile = new Utility();
    }

    public function testSimpleAttributes()
    {
        $string = 'id="my-id" class="my-class"';
        $expected = ['id' => 'my-id', 'class' => 'my-class'];
        $result = $this->classFile->parseAttributes($string);
        $this->assertEquals($expected, $result);
    }

    public function testAttributesWithSpaces()
    {
        $string = 'data-attr="value with spaces"  id="my-id"';
        $expected = ['data-attr' => 'value with spaces', 'id' => 'my-id'];
        $result = $this->classFile->parseAttributes($string);
        $this->assertEquals($expected, $result);
    }

    public function testEmptyAttributes()
    {
        $string = 'empty=""';
        $expected = ['empty' => ''];
        $result = $this->classFile->parseAttributes($string);
        $this->assertEquals($expected, $result);
    }

    public function testInvalidInput()
    {
        $string = 'invalid input';
        $expected = [];
        $result = $this->classFile->parseAttributes($string);
        $this->assertEquals($expected, $result);
    }

    public function testMultipleAttributes()
    {
        $string = 'id="my-id" class="my-class" data-attr="value"';
        $expected = ['id' => 'my-id', 'class' => 'my-class', 'data-attr' => 'value'];
        $result = $this->classFile->parseAttributes($string);
        $this->assertEquals($expected, $result);
    }
}