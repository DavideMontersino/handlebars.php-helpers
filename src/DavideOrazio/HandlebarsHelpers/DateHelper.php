<?php

namespace DavideOrazio\HandlebarsHelpers;

class DateHelper extends CustomHelper
{
	public function execute(\Handlebars\Template $template, \Handlebars\Context $context, $args, $source)
    {
        return date_format_day($context->get($args));
    }
}

