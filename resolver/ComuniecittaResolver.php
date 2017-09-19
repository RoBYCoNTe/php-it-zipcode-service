<?php 
	require_once __DIR__ . '/../vendor/simple_html_dom.php';
	require_once 'Resolver.php';

	class ComuniecittaResolver implements Resolver {
		public function getByZipCode($zipCode) {
			$html = file_get_html("http://www.comuniecitta.it/cerca-cap-internazionali?chiave=$zipCode");
			$tbody = $html->find('table.table.table-responsive tbody tr');
			$data = [];
			foreach($tbody as $tr) {
				if (count($tr->find('td')) <= 2) {
					continue;
				}
				$row = [
					'name' => $tr->find('td', 0)->plaintext,
					'country' => $tr->find('td', 1)->plaintext,
					'cap' => $tr->find('td', 2)->children(0)->innertext
				];
				if (is_null($row['name']) || empty($row['name']) || is_null($row['country']) || empty($row['country'])) {
					continue;
				}
				$data[] = $row;
			}
			return $data;
		}
		public function getByName($name) {
			return null;
		}
		public function getByCode($code) {
			return null;
		}
	}
?>