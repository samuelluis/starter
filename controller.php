<?php
	$parts = explode("/", $_SERVER['REQUEST_URI']);
	$action = end($parts);

	if($action!="") eval($action."();");

	function test(){
		$server = $_POST["server"];
		$port = $_POST["port"];
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		
		$link = mysql_connect("{$server}:{$port}", "{$user}", "{$pass}");
		echo ($link) ? "Connection Successfully!" : "Connection Failed!";
	}

	function connect(){
		$server = $_POST["server"];
		$port = $_POST["port"];
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		
		$link = mysql_connect("{$server}:{$port}", "{$user}", "{$pass}");
		mysql_select_db("information_schema", $link);
		$rs = mysql_query("select SCHEMA_NAME from SCHEMATA");

		while($schema = mysql_fetch_array($rs)) {
			echo "<tr><td>{$schema[0]}</td><td><button onclick='use(\"{$schema[0]}\");'>Use</button></td></tr>";
		}
	}

	function use_db(){
		$server = $_POST["server"];
		$port = $_POST["port"];
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		$database = $_POST["database"];
		
		$link = mysql_connect("{$server}:{$port}", "{$user}", "{$pass}");
		mysql_select_db("{$database}", $link);
		$rs = mysql_query("select TABLE_NAME from TABLES where TABLE_SCHEMA='{$database}'");

		while($table = mysql_fetch_array($rs)) {
			echo "<tr><td>{$table[0]}</td><td><input type='checkbox' name='tables[]' value='{$table[0]}'></td></tr>";
		}
	}
?>