<?php 
	require_once __DIR__ . '/../vendor/simple_html_dom.php';
	require_once 'Resolver.php';
	/**
	 * Zip Code Resolver
	 * @website: http://www.nonsolocap.it
	 */
	class NonsolocapResolver implements Resolver {
		public function getByZipCode($zipCode) {
			$html = file_get_html("http://www.nonsolocap.it/cap/$zipCode/");
			$tr = $html->find('tr.lh', 0);
			if (is_null($tr)) {
				return null;
			}
			$cells = $tr->find('td');
			$municipality = [];
			$municipality['name'] = $cells[1]->plaintext;
			$municipality['code'] = $cells[0]->plaintext;
			$municipality['region'] = $cells[3]->plaintext;
			$municipality['country'] = 'Italy';
			$municipality['zip_code'] = $cells[0]->plaintext;
			$municipality['province'] = $cells[2]->plaintext;
			
			return [$municipality];
		}
		public function getByName($name) {
			return null;
		}
		public function getByCode($code) {
			return null;
		}
	}
?>