<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('h_digit_month'))
{

	/***
	* CHANGE DIGIT TO MONTH NAME
	*
	* returns the month in words for a given month number
	*/
	
	function h_digit_month($num)
	{

		return date("F", strtotime(date("Y")."-".$num."-01"));
		
	}
}
// --------------------------------------------------------------------
if ( ! function_exists('h_compare_date'))
{
	//------------------------------------------------
	/**
	 * compare_date method
	 *
	 * Generally this makes sure that a date is greater or equalt to the other
	 *
	 */
	function h_compare_date() 
	{
		$startDate = $_POST['from_date'];
		$endDate = $_POST['to_date'];
		return h_date_is_greater_or_equal($startDate,$endDate);
	}
}
// --------------------------------------------------------------------
if ( ! function_exists('h_check_date_format'))
{
	/**
	 * h_check_date_format method
	 *
	 * @param Date $date
	 * @return bool
	 */
	function h_check_date_format($date) 
	{
		if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) 
		{
			//if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
				return true;
			//else
				//return false;
		}
		else
		{
			return false;
		}
	} 
}
if ( ! function_exists('h_date_is_greater_or_equal'))
{
	//------------------------------------------------
	/**
	 * h_date_is_greater_or_equal method
	 *
	 * Generally this makes sure that a date is greater or equalt to the other
	 *
	 */
	function h_date_is_greater_or_equal($startDate,$endDate) 
	{
		return strtotime($endDate) >= strtotime($startDate) ? true : false;
	}
}

// --------------------------------------------------------------------
if ( ! function_exists('h_format_date'))
{
	/**
	 * Method Name h_format_date
	 * Generally 
	 * 
	 */
	function h_format_date($date_1)
	{
		/*setlocale(LC_ALL,"hu_HU.UTF8");
            echo strftime("%A. %B %d. %Y. %X %Z",strtotime(date('Y-m-d h:i:s')));*/
		$past = new DateTime($date_1);
		$now = new DateTime();
		$interval = $now->diff($past);
		return $interval->format('%y years, %m months, %d days');
		//	return $interval->format('%y years, %m months, %d days,%h hours, %i minutes, %S seconds');

	}
}
// --------------------------------------------------------------------
if ( ! function_exists('h_thousands_currency_format'))
{
	function h_thousands_currency_format($num) 
	{
		$x_display = $num;
		if (is_numeric($num) && $num > 999) 
		{
			$x = round($num);
			$x_number_format = number_format($x);
			$x_array = explode(',', $x_number_format);
			$x_parts = array('K', 'M', 'B', 'T');
			$x_count_parts = count($x_array) - 1;
			$x_display = $x;
			$x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
			$x_display .= $x_parts[$x_count_parts - 1];
		}
		return $x_display;
	}
}

// --------------------------------------------------------------------
if ( ! function_exists('h_check_correct_date'))
{
	/**
	 * Method Name h_check_correct_date
	 * Generally 
	 * eg: 
	 */
	function h_check_correct_date($date)
	{
		$date = str_replace('-', '/', $date);
        
        //split the date
        $date_split  = explode('/', $date);

        //make sure we got 3 portions
        if (count($date_split) == 3) 
        {
            //if all the portions are numeric, which means its an actual date format
            if (is_numeric($date_split[0]) && is_numeric($date_split[1]) && is_numeric($date_split[2])) 
            {
                $date = date_create($date);
                if ($date) 
                {
                    //convert it to the format we want
                    $date = date_format($date,'m/d/Y');

                    //split the date again, since we now know format of the date
                    $date_split  = explode('/', $date);
                }
                else
                {
                    // problem with input ...
                    return false;
                }
            }
            else
            {
                // problem with input ...
                return false;
            }
            //finally we can pass in the values since we now know format of the date
            if (checkdate($date_split[0], $date_split[1], $date_split[2])) 
            {
                // valid date ...
                return true;
            } 
            else 
            {
                // problem with dates ...
                return false;
            }

        } 
        else 
        {
            // problem with input ...
            return false;
        }
	}
}
// --------------------------------------------------------------------
if ( ! function_exists('h_nice_date'))
{
	/**
	 * Method Name h_nice_date
	 * Generally 
	 * eg: converts a date to ,Sep 23rd, 2014
	 */
	function h_nice_date($date_1)
	{
		return date("M jS, Y",strtotime($date_1));
	}
}
?>