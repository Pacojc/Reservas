<?php
class View {
	public function show($viewName, $data = null)
	{
	//	include("views/header.php");
	include_once("views/$viewName.php");
	//	include("views/footer.php");
	}
}
