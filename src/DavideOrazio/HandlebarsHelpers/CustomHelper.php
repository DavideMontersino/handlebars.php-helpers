<?php

namespace DavideOrazio\HandlebarsHelpers;

abstract class CustomHelper implements \Handlebars\Helper{
	public function ParseArgs($args)
	{
		//regular expression generated from ((?<=")(?:\\.|[^"\\])*(?="))|(\w+)  with http://regex.larsolavtorvik.com/
		preg_match_all('/(?<=")[^"]*(?=")|(\w+)/i', $args, $result);
    	return $result[0];
	}
}