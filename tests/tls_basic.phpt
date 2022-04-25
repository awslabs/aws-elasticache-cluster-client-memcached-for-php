--TEST--
Test TLS
--SKIPIF--
<?php
include dirname (__FILE__) . '/config.inc';
if (!extension_loaded("memcached")) die ("skip");
if (!Memcached::HAVE_TLS) die ("skip no TLS support enabled");
if (!defined ('MEMC_TLS_CERT') || empty (MEMC_TLS_CERT)) die ("skip MEMC_TLS_CERT is not set");
if (!defined ('MEMC_TLS_KEY') || empty (MEMC_TLS_KEY)) die ("skip MEMC_TLS_KEY is not set");
?>
--INI--

--FILE--
<?php
include dirname (__FILE__) . '/config.inc';
$m = memc_get_tls_instance();

$obj = new MemcachedTLSContextConfig();
$obj->cert_file = MEMC_TLS_CERT;
$obj->key_file = MEMC_TLS_KEY;
$obj->skip_cert_verify = true;
$obj->skip_hostname_verify = true;

$m->setOption(Memcached::OPT_USE_TLS, 1);

$m->createAndSetTLSContext((array)$obj);

// Test basic use case of set get
$m->set('key', 'value', 60);
var_dump($m->get('key') == 'value');

// Make sure we failed to get key when TLS is disabled
$m->setOption(Memcached::OPT_USE_TLS, 0);
var_dump($m->get('key') == 'value');

// Test dynamically setting on/off TLS works
$m->createAndSetTLSContext((array)$obj);
$m->setOption(Memcached::OPT_USE_TLS, 1);
var_dump($m->get('key') == 'value');


echo "OK" . PHP_EOL;
?>
--EXPECT--
bool(true)
bool(false)
bool(true)
OK
