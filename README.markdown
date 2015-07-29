# Amazon ElastiCache Cluster Client

Amazon ElastiCache Cluster Client is used to connect to ElastiCache for Memcached clusters. This extension uses Amazon ElastiCache fork of libmemcached library to provide API for communicating with ElastiCache servers. Our changes are based on open-source memcached extension v.2.1.0 from https://github.com/php-memcached-dev/php-memcached. 
This client library is released under the [Apache 2.0 License](http://aws.amazon.com/apache-2-0/).

# Building

To compile this package to generate the PHP Memcached extension, do the following set of steps:

1) Checkout and compile the dependency package aws-elasticache-cluster-client-libmemcached via https://github.com/awslabs/aws-elasticache-cluster-client-libmemcached

2) Run the following set of commands under the current directory:

phpize
./configure --with-libmemcached-dir=<path to libmemcached build directory>
make
make install


Resources
---------
 * [Github link] ()https://github.com/awslabs/aws-elasticache-cluster-client-memcached-for-php)
 * [AmazonElastiCache Auto Discovery](http://docs.amazonwebservices.com/AmazonElastiCache/latest/UserGuide/AutoDiscovery.html)
 * [php-memcached] (https://github.com/php-memcached-dev/php-memcached)
 * [libmemcached](http://tangent.org/552/libmemcached.html)
 * [memcached](http://www.danga.com/memcached/)
 * [igbinary](https://github.com/phadej/igbinary/)
