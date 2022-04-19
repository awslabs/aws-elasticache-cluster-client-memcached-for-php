<?php

return (object) array(
    'cert_file' => NULL,        /* Cert file name */
    'key_file' => NULL,         /* Private key filename for cert_file */
    'key_file_pass' => NULL,    /* Optional password for key_file */
    'ca_cert_file' => NULL,
    'ca_cert_dir' => NULL,
    'protocols' => NULL,
    'ciphers' => NULL,
    'ciphersuites' => NULL,
    'prefer_server_ciphers' => NULL,
    'session_caching' => NULL,
    'session_cache_size' => NULL,
    'session_cache_timeout' => NULL,
    'skip_cert_verify' => false,
);

?>
