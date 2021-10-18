<?php
class View {
	public static function show($viewName, $data = null)
	{
	//	include("views/header.php");
	include_once("views/$viewName.php");
	//	include("views/footer.php");
	}
}
