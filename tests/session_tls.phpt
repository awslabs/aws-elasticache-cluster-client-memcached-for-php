--TEST--
Test storing PHP sessions using a TLS memcached server
--SKIPIF--
<?php
include dirname (__FILE__) . '/config.inc';
if (!extension_loaded("memcached")) die ("skip");
if (!Memcached::HAVE_TLS) die ("skip no TLS support enabled");
if (!Memcached::HAVE_SESSION) print "skip";
if (!defined ('MEMC_TLS_CERT') || empty (MEMC_TLS_CERT)) die ("skip MEMC_TLS_CERT is not set");
if (!defined ('MEMC_TLS_KEY') || empty (MEMC_TLS_KEY)) die ("skip MEMC_TLS_KEY is not set");
?>
--INI--
session.save_handler=memcached
memcached.sess_use_tls = on
memcached.sess_persistent=1

--FILE--
<?php
include dirname (__FILE__) . '/config.inc';

ini_set ('session.save_path', MEMC_TLS_SERVER_HOST . ':' . MEMC_TLS_SERVER_PORT);
ini_set ('memcached.sess_tls_cert_file', MEMC_TLS_CERT);
ini_set ('memcached.sess_tls_key_file', MEMC_TLS_KEY);
if (defined('MEMC_TLS_CA_FILE')) {
    ini_set ('memcached.sess_tls_ca_cert_file', MEMC_TLS_CA_FILE);
}
ini_set ('memcached.sess_tls_skip_cert_verify', true);
ini_set ('memcached.sess_tls_skip_hostname_verify', true);


session_start();
$_SESSION['test']=true;
session_write_close();
session_start();
var_dump($_SESSION);
session_write_close();

echo "OK" . PHP_EOL;
?>
--EXPECT--
array(1) {
  ["test"]=>
  bool(true)
}
OK
