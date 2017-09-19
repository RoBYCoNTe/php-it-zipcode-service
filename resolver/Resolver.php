<?php
	/**
	 * Base interface to implements for new resolvers.
	 */
	interface Resolver {
		/**
		 * Search cities by zip code 
		 * @return  array List of found cities.
		 */
		function getByZipCode($cap);
		/**
		 * Search cities by name
		 * @return  array List of found cities.
		 */
		function getByName($name);
		/**
		 * Search cities by code
		 * @return  array List of found cities.
		 */
		function getByCode($code);
	}

	
?>