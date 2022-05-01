<?php

/**
 * Sample PHP code to show how to create a TLS Memcached client.
 */

/* Configuration endpoint to use to initialize memcached client.
 * this is only an example */
$server_endpoint = "example.use1.cache.amazonaws.com";

/* Port for connecting to the cluster. */
$server_port = 11211;

/* initialize a Memcached client  */
$tls_client = new Memcached();

/* add the memcached's cluster servers */
$tls_client->addServer($server_endpoint, $server_port);

/* enable TLS option */
if(!$tls_client->setOption(Memcached::OPT_USE_TLS, 1)) {
    echo $tls_client->getLastErrorMessage(), "\n";
    exit(1);
}

/* create new TLS context configurations object and set your context values.
 * see MemcachedTLSContextConfig in memcached-api.php for all configurations */
$tls_config = new MemcachedTLSContextConfig();
$tls_config->cert_file = '/path/to/memc.crt';
$tls_config->key_file = '/path/to/memc.key';
$tls_config->ca_cert_file = '/path/to/ca.crt';
$tls_config->hostname = '*.example.use1.cache.amazonaws.com';
$tls_config->skip_cert_verify = false;
$tls_config->skip_hostname_verify = false;

/* pass the TLS configurations in order to create OpenSSL's SSL_CTX and to set it to your client.
* note: all the client's servers will be configured with these TLS context configurations. */
$tls_client->createAndSetTLSContext((array)$tls_config);

/* test the TLS connection with set-get scenario: */

 /* store the data for 60 seconds in the cluster.
 * The client will decide which cache host will store this item.
 */
if($tls_client->set('key', 'value', 60)) {
    print "Successfully stored key\n";
} else {
    echo "Failed to set key: ", $tls_client->getLastErrorMessage(), "\n";
    exit(1);
}

/* retrieve the key */
if ($tls_client->get('key') === 'value') {
    print "Successfully retrieved key\n";
} else {
    echo "Failed to get key: ", $tls_client->getLastErrorMessage(), "\n";
    exit(1);
}

