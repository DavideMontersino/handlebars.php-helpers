<?php

namespace DavideOrazio\HandlebarsHelpers;

class StringFormatHelper extends CustomHelper
{
	public function execute(\Handlebars\Template $template, \Handlebars\Context $context, $args, $source)
    {
    	$args = $this->ParseArgs($args);

        return sprintf($args[0], $context->get($args[1]));
    }
}