<?php

/**
 * Require on Windows:
 * extension=php_pdo_sqlite.dll
 * extension=php_sqlite.dll
 * extension=php_sqlite3.dll
 * 
 * Params received by POST or GET
 * Note that params must be encoded with urlencode() for PHP
 * 
 * select : What fielts to select. Default *, all fields
 * table : Name of table to query
 * where : 


 * @example
 * @code
  //RAW Querie example, just for demonstration. Do not permit on production
  //On html (or javascript file) file:
  <script src="../../3rd/mootools-core.js"></script>
  <script src="../library/WEAjax.js"></script>
  <script>
  window.addEvent('domready', function(){
  var we = new WEAjaxList({url:'../../_data/dataToJson.php'});
  we.getData({'table':'joomla', 'select': 'name, version, date','where': 'support = 1'});
  //table=joomla&select=name%2C%20version%2C%20date&where=support%20%3D%201
  });
  /*
  //JSON example response
  [{
  "name":"Joomla 1.5",
  "0":"Joomla 1.5",
  "version":"1.5",
  "1":"1.5",
  "date":"2008-01-22",
  "2":"2008-01-22"
  },
  {
  "name":"Joomla 1.7",
  "0":"Joomla 1.7",
  "version":"1.7",
  "1":"1.7",
  "date":"2011-07-19",
  "2":"2011-07-19"
  }]
 *//*
  </script>
 * @endcode
 * @example
 * @code
  //On html or js file:
  var we = new WEAjaxList({url:'../../_data/dataToJson.php'});
  //SELECT DISTINCT uf FROM cidades
  //dataToJson.php?queryraw=SELECT%20DISTINCT%20uf%20FROM%20cidades :
  $method = param('method', null);
  $query = buildquery();
  $data = getData($query, $method);
  $result = json_formated($data, true);
  //RAW Querie example, ***just for testing***
  //sites. Change buildUnsafeQuery() method and sanitize user inputs
  <script src="../../3rd/mootools-core.js"></script>
  <script src="../library/WEAjax.js"></script>
  <script>
  window.addEvent('domready', function(){
  var we = new WEAjaxList({url:'../../_data/dataToJson.php'});
  we.getData({'queryraw':'SELECT DISTINCT uf FROM cidades'})
  //	SELECT DISTINCT uf FROM cidades
  //queryraw=SELECT%20DISTINCT%20uf%20FROM%20cidades
  });
  /*
  //JSON example response
  [{
  "uf":"AC",
  "0":"AC"
  },
  {
  "uf":"AL",
  "0":"AL"
  },
  {
  "uf":"AM",
  "0":"AM"
  }
  //... more data ...
  ]
 *//*
  </script>
 * @endcode
 * 
 */
$method = param('method', null);
$query = buildUnsafeQuery();
$data = getData($query, $method);

//Filter data to single array, if is need
//@todo I guess that exist one better way to do it
$resulttype = param('resulttype');
$resultparam = param('resultparam');
if ($resulttype && $resultparam) {
	$newData= array();
	foreach($data AS $item){
		$newData[] = $item[$resultparam];
	}
	$data = null;
	$data = $newData;
}
//Filter data to single array, if is need, eof

$result = json_formated($data, true);
echo $result;
/*
  switch (param('action')) {
  case 'remove':
  echo json_formated(TRUE);
  break;
  default:
  echo json_formated(getData($result));
  break;
  }
 */

/**
 * Unsafe method to build queries, because it accept queryraw for testing 
 * propuses and param() do not filter for specific data tipes
 * @see http://php.net/filter
 *
 * @return string $query
 */
function buildUnsafeQuery() {
	$queryraw = param('queryraw');
	if ($queryraw) {
		//If received one raw querie, do instead of try parse
		//If it is insecure on production ambients? Fuck yeah!
		return $queryraw;
	}

	$table = param('table', 'cidades');
	$select = param('select', '*');
	$where = param('where');
	$start = param('start', 0);
	$limit = param('limit', 1000);

	//print_r($_GET['result']);
	//die($result);

	$query = 'SELECT ' . $select . ' FROM ' . $table;
	if ($where) {
		$query .= ' WHERE ' . $where;
	}
	$query .= ' LIMIT ' . $start . ',' . $limit;


	return $query;
}

/**
 * Run one $query on SQLite3 database in current directory using PDO
 * 
 * @see http://www.sqlite.org/lang_select.html
 *
 * @param string $query to run on database
 * @param string $method witch method use to querie the database
 * @return array of database rows 
 */
function getData($query, $method = NULL) {
	try {
		$db = new PDO('sqlite:data.db3'); //Access existent data.db3 on current directory, or create one
	} catch (Exception $e) {
		die($error);
	}
	$sth = $db->prepare($query);
	if (!$sth) {
		//If the query is wrong, $sth will not be one object and cause error 
		//on next lines
		return NULL;
	}
	$sth->execute();
	$rowarray = $sth->fetchAll();
	//print_r($rowarray); die;

	return $rowarray;
}

/**
 * Simple way to get  $_POST or $_GET, urldecode
 * @see http://php.net/filter
 * @see http://www.php.net/manual/en/filter.filters.sanitize.php
 * @todo Add Sanitize filters and one adiciona param $type = 'string'
 *
 * @param string Name of param to take from $_POST or $_GET
 * @param mixed $default Default value if is not defined
 * @return string 
 */
function param($name, $default = NULL, $type = 'string') {
	if (isset($_POST[$name])) {
		return urldecode($_POST[$name]);
	} elseif (isset($_GET[$name])) {
		return urldecode($_GET[$name]);
	} else {
		return $default;
	}
}

/**
 * Simple formated json_encode output
 *
 * @param type $object
 * @return $formatedJSON json_encode formated
 */
function json_formated($object, $simple = FALSE) {
	$json = json_encode($object);
	if ($simple) {
		return $json;
	}
	$formatedJSON = str_replace(',', ",\n\t", $json);
	$formatedJSON = str_replace('{', "{\n\t", $formatedJSON);
	$formatedJSON = str_replace('}', "\n}", $formatedJSON);
	return $formatedJSON;
}