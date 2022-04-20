<?php

return (object) array(
    'cert_file' => NULL,        /* Cert file name */
    'key_file' => NULL,         /* Private key filename for cert_file */
    'key_file_pass' => NULL,    /* Optional password for key_file */
    'ca_cert_file' => NULL,
    'ca_cert_dir' => NULL,
    'hostname' => NULL,         /* Required unless skip_hostname_verify is set to true */
    'protocols' => NULL,
    'ciphers' => NULL,
    'ciphersuites' => NULL,
    'prefer_server_ciphers' => NULL,
    'skip_cert_verify' => false,
    'skip_hostname_verify' => false,
);

?>
