<?php
	require_once 'Resolver.php';

	class LocalDataResolver implements Resolver {
		private function load() {
			$dataPath = __DIR__ . "/data/comuni.json"; 
			$content = file_get_contents($dataPath);
			return json_decode($content, true);
		}

		public function getByZipCode($zipCode) {
			$data = $this->load();
			foreach($data as $item) {
				if (in_array($zipCode, $item['cap'])) {
					return [[
						'name' => $item['nome'],
						'code' => $item['codice'],
						'region' => $item['regione']['nome'],
						'country' => 'Italy',
						'zip_code' => $zipCode,
						'province' => $item['provincia']['nome']
					]];
				}
			}
			return null;
		}
		public function getByName($name) {
			return [];
		}
		public function getByCode($code) {
			return [];
		}
	}
?>