<?php 
	
	header("Content-Type: application/json");
	$zipCode = isset($_GET['zip_code']) ? $_GET['zip_code'] : null;
	if (is_null($zipCode) || empty($zipCode)) {
		echo json_encode(['error' => true, 'message' => 'Please, provide valid ZIP code.']);
		exit;
	}
	
	//	List of implemented resolvers. 
	require_once 'resolver/LocalDataResolver.php';
	require_once 'resolver/NonsolocapResolver.php';
	require_once 'resolver/ComuniecittaResolver.php';

	//	If you need to implement new resolver, you can add it here.
	//	Resolver priority is handled by array index (the first that match the code win).
	$resolvers = [
		new LocalDataResolver(),	/* Search cities using local repository. */
		new NonsolocapResolver(),	/* Search cities using nonsolocap.it website (scraping). */
		new ComuniecittaResolver()	/* Search cities using comuniecitta.it website (scraping). */
	];
	foreach($resolvers as $resolver) {
		$data = $resolver->getByZipCode($zipCode);
		if (!is_null($data)) {
			echo json_encode(['error' => false, 'data' => $data]);
			exit;
		}
	}
	echo json_encode(['error' => true, 'message' => "Unable to locate specified ZIP code: $zipCode"]);
?>