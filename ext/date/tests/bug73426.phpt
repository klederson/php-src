--TEST--
Bug #73426 (createFromFormat with 'z' format char results in incorrect time)
--INI--
date.timezone=UTC
--FILE--
<?php
$date = '12:00:00 15';
$format = 'H:i:s z';
var_dump(DateTime::createFromFormat($format, $date));

$date = '16 12:00:00';
$format = 'z H:i:s';
var_dump(DateTime::createFromFormat($format, $date));

?>
--EXPECTF--
object(DateTime)#%d (%d) {
  ["date"]=>
  string(26) "2016-01-16 12:00:00.000000"
  ["timezone_type"]=>
  int(3)
  ["timezone"]=>
  string(3) "UTC"
}
object(DateTime)#%d (%d) {
  ["date"]=>
  string(26) "2016-01-17 12:00:00.000000"
  ["timezone_type"]=>
  int(3)
  ["timezone"]=>
  string(3) "UTC"
}
