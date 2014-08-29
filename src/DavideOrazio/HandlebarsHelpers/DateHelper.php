<?php

namespace DavideOrazio\HandlebarsHelpers;

class DateHelper extends CustomHelper
{
	static function date_format_day($dateArray) {
		if (is_string($dateArray)) $dateArray = self::date_create_array($dateArray);
		return self:: date_add_zero($dateArray['day'])."/".
				self::date_add_zero($dateArray['month'])."/".
				$dateArray['year'];
	}

	/**
	 * 
	 * @param string $val
	 * @return array
	 */
	static function date_create_array($val) {
		if (is_array($val)) {
			$val = self::date_to_sql_string($val);
		}
		
		$dateTime = explode(' ',$val);
		$dateTime[0] = str_replace("/", "-", $dateTime[0]);
		$date = explode('-',$dateTime[0]);
		$time = explode(':',$dateTime[1]);
		
		$dateArray = array(
				'year'		=> $date[0],
				'month'		=> $date[1],
				'day'		=> $date[2],
				'hours'		=> $time[0],
				'minutes'	=> $time[1],
				'seconds'	=> $time[2]
		);
		
		return $dateArray;
	}

	static function date_add_zero($val) {
		if (strlen($val."")<2) return "0".$val;
		else return $val;
	}

	/**
	 *
	 * @param array $date
	 * @return string
	 */
	static function date_to_sql_string($date) {
		if (isset($date['mon'])) {
			return $date['year']."/".$date['mon']."/".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
		} else {
			return $date['year']."/".$date['month']."/".$date['day']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
		}
	}
	public function execute(\Handlebars\Template $template, \Handlebars\Context $context, $args, $source)
    {
        return self::date_format_day($context->get($args));
    }
}

