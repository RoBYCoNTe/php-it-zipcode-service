<?php
	interface Resolver {
		function getByZipCode($cap);
		function getByName($name);
		function getByCode($code);
	}

	
?>