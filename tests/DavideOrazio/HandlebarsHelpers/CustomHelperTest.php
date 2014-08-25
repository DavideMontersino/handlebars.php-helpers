<?php

namespace DavideOrazio\HandlebarsHelpers;

require "vendor/autoload.php";
class CustomHelperTest extends \PHPUnit_Framework_TestCase
{

	public $CustomHelper;
    public function setUp()
    {
        $this->CustomHelper = $this->getMockForAbstractClass('\DavideOrazio\HandlebarsHelpers\CustomHelper');
    }

    /**
     * @covers CustomHelper::ParseArgs
     */
    public function testParseArgsReturnsArray()
    {
        
        $this->assertTrue(is_array($this->CustomHelper->ParseArgs("")));
    }
    
    /**
     * @covers CustomHelper::ParseArgs
     */
    public function testParseArgsReturnsCorrectValue()
    {
    	$unparsedArgs = "\"%s\" string";
        $parsedArgs = $this->CustomHelper->ParseArgs($unparsedArgs);
        $this->assertEquals("%s", $parsedArgs[0]);
        $this->assertEquals("string", $parsedArgs[1]);
    }

    public function tearDown()
    {
        // your code here
    }
}

