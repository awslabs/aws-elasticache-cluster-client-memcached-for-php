<?php

if (file_exists (dirname (__FILE__) . '/config.inc.local')) {
	include dirname (__FILE__) . '/config.inc.local';
}
else {
	define ("MEMC_SERVER_HOST", "127.0.0.1");
	define ("MEMC_SERVER_PORT", 11211);

	//define ("MEMC_SASL_SERVER_HOST", "127.0.0.1");
	//define ("MEMC_SASL_SERVER_PORT", 11212);

	//define ('MEMC_SASL_USER', 'memcached');
	//define ('MEMC_SASL_PASS', 'test');

	define ("MEMC_TLS_SERVER_HOST", "127.0.0.1");
	define ("MEMC_TLS_SERVER_PORT", 11213);

	//define ("MEMC_TLS_CERT", "/path/to/memc.crt");
	//define ("MEMC_TLS_KEY", "/path/to/memc.key");
	//define ("MEMC_TLS_CA_FILE", "/path/to/ca.crt");
}

function memc_create_instance ($host, $port, array $opts = array (), $persistent_id = null)
{
	$memcached = new Memcached($persistent_id);
	if ($memcached->setOptions ($opts) == false)
		echo "Failed to set options" . PHP_EOL;

	$memcached->addServer($host, $port);
	if ($memcached->flush() === false) {
		return NULL;
	}
	return $memcached;
}

function memc_get_instance (array $opts = array (), $persistent_id = null)
{
	return memc_create_instance(MEMC_SERVER_HOST, MEMC_SERVER_PORT, $opts, $persistent_id);
}

function memc_get_sasl_instance (array $opts = array (), $persistent_id = null)
{
	return memc_create_instance(MEMC_SASL_SERVER_HOST, MEMC_SASL_SERVER_PORT, $opts, $persistent_id);

}

function memc_get_tls_instance (array $opts = array (), $persistent_id = null)
{
    $memcached = new Memcached($persistent_id);
    if ($memcached->setOptions ($opts) == false) {
        echo "memc_get_tls_instance(): Failed to set options" . PHP_EOL;
    }
    $memcached->addServer(MEMC_TLS_SERVER_HOST, MEMC_TLS_SERVER_PORT);
    return $memcached;
}

function memc_run_test ($test_function, $options = array ())
{
	foreach ($options as $option_set) {
		$memc = memc_get_instance ($option_set ['options']);
		$test_function ($memc, $option_set);
	}
	echo "TEST DONE" . PHP_EOL;
}

function memc_create_combinations ($name, $serializer, $ignore_object_type = false)
{
	return array (
			array (
				'title' => "$name serializer, ascii protocol",
				'options' => array (
					Memcached::OPT_SERIALIZER => $serializer
				),
				'ignore_object_type' => $ignore_object_type
			),
			array (
				'title' => "$name serializer, binary protocol",
				'options' => array (
					Memcached::OPT_BINARY_PROTOCOL => true,
					Memcached::OPT_SERIALIZER => $serializer
				),
				'ignore_object_type' => $ignore_object_type
			),
	);
}

function memc_get_version($memc) {
	$version = $memc->getVersion();
	return array_pop($version);
}
