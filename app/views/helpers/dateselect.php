<?
class DateselectHelper extends Helper {
	
function selectDate (
                        $sel_d = 0       // selected day
                      , $sel_m = 0       // selected month
                      , $sel_y = 0       // selected year
                      , $var_d = 'd'     // name for day variable
                      , $var_m = 'm'     // name for month variable
                      , $var_y = 'y'     // name for year variable
                      , $min_y = 0       // minimum year
                      , $max_y = 0       // maximum year
                      , $enabled = true  // enable drop-downs?
                    ) {

  // --------------------------------------------------------------------------
  // First of all, set up some sensible defaults

  // Default day is today
  if ($sel_d == 0) 
    $sel_d = date('j');

  // Default month is this month
  if ($sel_m == 0) 
    $sel_m = date('n');

  // Default year is this year
  if ($sel_y == 0) 
    $sel_y = date('Y');

  // Default minimum year is this year
  if ($min_y == 0) 
    $min_y = date('Y');

  // Default maximum year is two years ahead
  if ($max_y == 0) 
    $max_y = ($min_y + 2);


  // --------------------------------------------------------------------------
  // Start off with the drop-down for Days
  
  // Start opening the select element
  echo '<select name="'. $var_d. '"';

  // Add disabled attribute if necessary
  if (!$enabled) 
    echo ' disabled="disabled"';

  // Finish opening the select element
  echo '>\n';

  // Loop round and create an option element for each day (1 - 31)
  for ($i = 1; $i <= 31; $i++) {

    // Start the option element
    echo '\t<option value="'. $i. '"';

    // If this is the selected day, add the selected attribute
    if ($i == $sel_d) 
      echo ' selected="selected"';

    // Display the value and close the option element
    echo '>'. $i. '</option>\n';

  }

  // Close the select element
  echo '</select>\n';


  // --------------------------------------------------------------------------
  // Now do the drop-down for Months

  // Start opening the select element
  echo '<select name="'. $var_m. '"';

  // Add disabled attribute if necessary
  if (!$enabled) 
    echo ' disabled="disabled"';

  // Finish opening the select element
  echo '>\n';

  // Loop round and create an option element for each month (Jan - Dec)
  for ($i = 1; $i <= 12; $i++) {

    // Start the option element
    echo '\t<option value="'. $i. '"';

    // If this is the selected month, add the selected attribute
    if ($i == $sel_m) 
      echo ' selected="selected"';

    // Display the value and close the option element
    echo '>'. date('F', mktime(3, 0, 0, $i)). '</option>\n';

  }

  // Close the select element
  echo '</select>\n';


  // --------------------------------------------------------------------------
  // Finally, the drop-down for Years

  // Start opening the select element
  echo '<select name="'. $var_y. '"';

  // Add disabled attribute if necessary
  if (!$enabled) 
    echo ' disabled="disabled"';

  // Finish opening the select element
  echo '>\n';

  // Loop round and create an option element for each year ($min_y - $max_y)
  for ($i = $min_y; $i <= $max_y; $i++) {

    // Start the option element
    echo '\t<option value="'. $i. '"';

    // If this is the selected year, add the selected attribute
    if ($i == $sel_y) 
      echo ' selected="selected"';

    // Display the value and close the option element
    echo '>'. $i. '</option>\n';

  }

  // Close the select element
  echo '</select>\n';

}

}