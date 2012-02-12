<?php

/* JoomlaFox! Code Snippet to export Joomla table as .csv, Version 1.0, 2009-12-05
 * by Emerson Rocha Luiz - Licenced by Creative Commons By 3.0 
 * http://www.fititnt.org/codigo/joomlafox/export-csv.html */


$joomla_table = 'users'; //Edit for one simple table export (no need table prefix)
$query = ""; // Edit here if you want COMPLEX selects from table(s)/especific fields
//TODO: make this code a bit more 'Joomla Framework Like'
$app = JFactory::getApplication();
$table = $app->getCfg('dbprefix') . $joomla_table;
if (!$query) {
	$query = "select * from $table";
}
$host = $app->getCfg('host');
$db = $app->getCfg('db');
$user = $app->getCfg('user');
$password = $app->getCfg('password');
$myquery = mysql_query($query);
$fields_cnt = mysql_num_fields($myquery);
$time = date('m.d.y-H.i.s');
$filenameoutput = "JFoxCSV-{$joomla_table}_{$time}";
//Output CSV Options
$line_terminated = "\n";
$field_terminated = ",";
$enclosed = '"';
$escaped = '\\';
$export_schema = '';

for ($i = 0; $i < $fields_cnt; $i++) {
	$l = $enclosed . str_replace($enclosed, $escaped . $enclosed, stripslashes(mysql_field_name($myquery, $i))) . $enclosed;
	$export_schema .= $l;
	$export_schema .= $field_terminated;
}
$output = trim(substr($export_schema, 0, -1));
$output .= $line_terminated;
while ($row = mysql_fetch_array($myquery)) {
	$export_schema = '';
	for ($j = 0; $j < $fields_cnt; $j++) {
		if ($row[$j] == '0' || $row[$j] != '') {
			if ($enclosed == '') {
				$export_schema .= $row[$j];
			} else {
				$export_schema .= $enclosed .
						str_replace($enclosed, $escaped . $enclosed, $row[$j]) . $enclosed;
			}
		} else {
			$export_schema .= '';
		}

		if ($j < $fields_cnt - 1) {
			$export_schema .= $field_terminated;
		}
	}
	$output .= $export_schema;
	$output .= $line_terminated;
}
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($output));
header("Content-type: application/csv");
header("Content-Disposition: attachment; filename={$filenameoutput}.csv");
echo $output;
exit;
$app->close();
?>
