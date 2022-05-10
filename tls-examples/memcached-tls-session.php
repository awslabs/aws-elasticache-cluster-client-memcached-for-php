<?php

/**
 * Sample PHP code to show how to store PHP sessions in Memcached with TLS enabled.
 * See https://www.php.net/manual/en/memcached.sessions.php for more information.
 */

/* Configuration endpoint to use to initialize memcached client. */
const MEMC_SERVER_HOST = '0001.example.use1.cache.amazonaws.com';

/* Port for connecting to the cluster. */
const MEMC_SERVER_PORT = 11211;

/* Modify php.ini with your session and TLS context configurations, or set it in runtime as follows:
 * (See memcached.ini for all configurations) */
ini_set('session.save_handler', 'memcached');
ini_set('session.save_path', MEMC_SERVER_HOST . ':' . MEMC_SERVER_PORT);

ini_set('memcached.sess_use_tls', true);
ini_set('memcached.sess_tls_cert_file', '/path/to/memc.crt');
ini_set('memcached.sess_tls_key_file', '/path/to/memc.key');
ini_set('memcached.sess_tls_ca_cert_file', '/path/to/ca.crt');
ini_set('memcached.sess_tls_hostname', '*.example.use1.cache.amazonaws.com');

/* Start a new session */
session_start();
echo "Session ID: ", session_id(), "\n";

/* Set session variables */
$_SESSION['test'] = true;
$_SESSION['foo'] = "bar";
echo "Session variables: ", var_dump($_SESSION);

/* End the current session and store session data */
session_write_close();
