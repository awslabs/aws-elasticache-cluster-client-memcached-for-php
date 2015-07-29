Build Status
------------
[![Build Status](https://travis-ci.org/php-memcached-dev/php-memcached.png?branch=master)](https://travis-ci.org/php-memcached-dev/php-memcached)

Description
-----------
This extension uses Amazon ElastiCache fork of libmemcached library to provide API 
for communicating with ElastiCache servers. Our changes are based on open-source
memcached extension v.2.1.0 from https://github.com/php-memcached-dev/php-memcached

Amazon ElastiCache is a high-performance, distributed memory object caching system,
generic in nature, but intended for use in speeding up dynamic web applications
by alleviating database load.

Building
--------

    $ phpize
    $ ./configure
    $ make
    $ make test

Resources
---------
 * [libmemcached](http://libmemcached.org/libMemcached.html)
 * [memcached](http://memcached.org/)
 * [AmazonElastiCache Auto Discovery](http://docs.amazonwebservices.com/AmazonElastiCache/latest/UserGuide/AutoDiscovery.html)
 * [php-memcached] (https://github.com/php-memcached-dev/php-memcached)
 * [igbinary](https://github.com/phadej/igbinary/)
