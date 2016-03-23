# Amazon ElastiCache Cluster Client

Amazon ElastiCache Cluster Client is used to connect to ElastiCache for Memcached clusters. This client supports auto-discovery capabilities which allow you to easily manage your Memcached cluster configuration. This extension uses Amazon ElastiCache fork of libmemcached library to provide API for communicating with ElastiCache servers. Our changes are based on open-source memcached extension v.2.1.0 from https://github.com/php-memcached-dev/php-memcached. This code branch is compatible with PHP 7.x. Other PHP versions (including PHP 5.x) are not supported. 

This client library is released under the [Apache 2.0 License](http://aws.amazon.com/apache-2-0/).

# To install from pre-compiled client artifact on 64-bit Linux, please follow the steps below:

--- Ubuntu 14.04 AMI ---
0. Launch a new instance from the AMI
1. Run the following commands
> sudo apt-get update
> sudo apt-get install gcc g++
2. Install PHP 7.0
3. Download and unzip Amazon ElastiCache Cluster Client from https://s3.amazonaws.com/elasticache-downloads/ClusterClient/PHP-7.0/latest-64bit
4. With root permission, copy the extracted artifact file amazon-elasticache-cluster-client.so into /usr/lib/php/20151012
5. Insert the line "extension=amazon-elasticache-cluster-client.so" into file /etc/php/7.0/cli/php.ini

--- Amazon Linux 201509 AMI/Red Hat 7 AMI ---
0. Launch a new instance from the AMI
1. Run the following command
> sudo yum install gcc-c++
2. Install PHP 7.0
3. Download and unzip Amazon ElastiCache Cluster Client from https://s3.amazonaws.com/elasticache-downloads/ClusterClient/PHP-7.0/latest-64bit
4. With root permission, copy the extracted artifact file amazon-elasticache-cluster-client.so into /usr/lib64/php/modules/
5. Insert the line "extension=amazon-elasticache-cluster-client.so" into file /etc/php.ini

--- SUSE Linux AMI ---
0. Launch a new instance from the AMI
1. Run the following command
> sudo zypper install gcc
2. Install PHP 7.0
3. Download and unzip Amazon ElastiCache Cluster Client from https://s3.amazonaws.com/elasticache-downloads/ClusterClient/PHP-7.0/latest-64bit
4. With root permission, copy the extracted artifact file amazon-elasticache-cluster-client.so into /usr/lib64/php7/extensions/
5. Insert the line "extension=amazon-elasticache-cluster-client.so" into file /etc/php7/cli/php.ini

# To compile the client from source, do the following set of steps:

0) Launch a Linux-based EC2 instance and install PHP 7 along with its required dependencies. 

1) Checkout and compile the dependency package aws-elasticache-cluster-client-libmemcached via https://github.com/awslabs/aws-elasticache-cluster-client-libmemcached

2) Run the following set of commands under the current directory:

> phpize

> ./configure --with-libmemcached-dir=&lt;path to libmemcached build directory&gt; --disable-memcached-sasl

> make

> make install

Note: you can statically link the libmemcached library into the PHP binary so it can be ported across various Linux platforms. To do that, run the following command before "make":
> sed -i "s#-lmemcached#<libmemcached build directory>\/lib\/libmemcached.a -lcrypt -lpthread -lm -lstdc++ -lsasl2#" Makefile

# Resources
---------
 * [Github link] (https://github.com/awslabs/aws-elasticache-cluster-client-memcached-for-php)
 * [AmazonElastiCache Auto Discovery](http://docs.amazonwebservices.com/AmazonElastiCache/latest/UserGuide/AutoDiscovery.html)
 * [php-memcached] (https://github.com/php-memcached-dev/php-memcached)
 * [libmemcached](http://tangent.org/552/libmemcached.html)
 * [memcached](http://www.danga.com/memcached/)
 * [igbinary](https://github.com/phadej/igbinary/)
