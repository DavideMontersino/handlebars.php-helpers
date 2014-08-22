<?php

namespace DavideOrazio\HandlebarsHelpers;

abstract class CustomHelper implements \Handlebars\Helper{
	public function ParseArgs($args)
	{
		//regular expression generated with http://regex.larsolavtorvik.com/
		preg_match_all('/".*"|\S+/i', $args, $result);
    	return $result[0];
	}
}