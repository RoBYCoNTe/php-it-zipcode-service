<?php 
	require_once __DIR__ . '/../vendor/simple_html_dom.php';
	require_once 'Resolver.php';

	/**
	 * Zip Code Resolver
	 * @website: https://codice-avviamento-postale.it
	 */
	class CodiceavviamentopostaleResolver implements Resolver {
		public function getByZipCode($zipCode) {
			$url = "https://codice-avviamento-postale.it/cap/$zipCode";
			$html = file_get_html($url);
			if (is_null($html) || $html === false) {
				return [];
			}
			$name = $html->find('body div.container div.row div.col-md-12 div.margin-top-40 h3', 0)->plaintext;
			if (is_null($name) || empty($name)) {
				return [];
			}
			$province = $html->find('body div.container div.row div.col-md-12 div.margin-top-40 h4', 0)->plaintext;
			if (is_null($province) || empty($province)) {
				return [];
			}

			return [[
				'zip_code' => $zipCode,
				'name' => trim(str_replace("Comune: ", "", $name)),
				'code' => $zipCode,
				'province' => trim(str_replace("Provincia:", "", $province)),
				'country' => 'Italy'
			]];
		}

		public function getByName($name) {
			return [];
		}

		public function getByCode($code) {
			return [];
		}

	}
?>