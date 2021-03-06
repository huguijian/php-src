--TEST--
Test fopen() for reading cp1253 to UTF-8 path 
--SKIPIF--
<?php
include dirname(__FILE__) . DIRECTORY_SEPARATOR . "util.inc";

skip_if_not_win();
if (getenv("SKIP_SLOW_TESTS")) die("skip slow test");
skip_if_no_required_exts();

?>
--FILE--
<?php
/*
#vim: set fileencoding=cp1253
#vim: set encoding=cp1253
*/

include dirname(__FILE__) . DIRECTORY_SEPARATOR . "util.inc";

$item = "διαδρομή δοκιμής";
$prefix = create_data("file_cp1253", $item);
$fn = $prefix . DIRECTORY_SEPARATOR . $item;

$f = fopen($fn, 'r');
if ($f) {
	var_dump($f, fread($f, 42));
	var_dump(fclose($f));
} else {
	echo "open utf8 failed\n";
} 

remove_data("file_cp1253");

?>
===DONE===
--EXPECTF--	
resource(%d) of type (stream)
string(37) "reading file wihh multibyte filename
"
bool(true)
===DONE===
