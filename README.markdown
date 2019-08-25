# Amazon ElastiCache Cluster Client

Amazon ElastiCache Cluster Client is used to connect to ElastiCache for Memcached clusters. This client supports auto-discovery capabilities which allow you to easily manage your Memcached cluster configuration. This extension uses Amazon ElastiCache fork of libmemcached library to provide API for communicating with ElastiCache servers. Our changes are based on open-source memcached extension v.2.1.0 from https://github.com/php-memcached-dev/php-memcached. This code branch is compatible with PHP 7.x. Other PHP versions (including PHP 5.x) are not supported. 

This client library is released under the [Apache 2.0 License](http://aws.amazon.com/apache-2-0/).

# To install from pre-compiled client artifact on 64-bit Linux, please follow the steps below:

--- Ubuntu 14.04 AMI ---

a) Launch a new instance from the AMI

b) Run the following commands

> sudo apt-get update

> sudo apt-get install gcc g++

c) Install PHP 7.0

d) Download and unzip Amazon ElastiCache Cluster Client from https://s3.amazonaws.com/elasticache-downloads/ClusterClient/PHP-7.0/latest-64bit

e) With root permission, copy the extracted artifact file amazon-elasticache-cluster-client.so into /usr/lib/php/20151012

f) Insert the line "extension=amazon-elasticache-cluster-client.so" into file /etc/php/7.0/cli/php.ini

--- Amazon Linux 201509 AMI/Red Hat 7 AMI ---

a) Launch a new instance from the AMI

b) Run the following command

> sudo yum install gcc-c++

c) Install PHP 7.0

d) Download and unzip Amazon ElastiCache Cluster Client from https://s3.amazonaws.com/elasticache-downloads/ClusterClient/PHP-7.0/latest-64bit

e) With root permission, copy the extracted artifact file amazon-elasticache-cluster-client.so into /usr/lib64/php/modules/

f) Insert the line "extension=amazon-elasticache-cluster-client.so" into file /etc/php.ini

--- SUSE Linux AMI ---

a) Launch a new instance from the AMI

b) Run the following command

> sudo zypper install gcc

c) Install PHP 7.0

d) Download and unzip Amazon ElastiCache Cluster Client from https://s3.amazonaws.com/elasticache-downloads/ClusterClient/PHP-7.0/latest-64bit

e) With root permission, copy the extracted artifact file amazon-elasticache-cluster-client.so into /usr/lib64/php7/extensions/

f) Insert the line "extension=amazon-elasticache-cluster-client.so" into file /etc/php7/cli/php.ini

# To compile the client from source, do the following set of steps:

a) Launch a Linux-based EC2 instance and install PHP 7 along with its required dependencies. 

b) Checkout and compile the dependency package aws-elasticache-cluster-client-libmemcached via https://github.com/awslabs/aws-elasticache-cluster-client-libmemcached

c) Run the following set of commands under the current directory:

> phpize

> ./configure --with-libmemcached-dir=&lt;path to libmemcached build directory&gt; --disable-memcached-sasl

Note: If you want to enable igbinary support, checkout, compile, and install the upstream igbinary7 package https://github.com/igbinary/igbinary7, and append the option "--enable-memcached-igbinary" at the end of the "configure" command above. 

> make

> make install

Note: you can statically link the libmemcached library into the PHP binary so it can be ported across various Linux platforms. To do that, run the following command before "make":

> sed -i "s#-lmemcached#<libmemcached build directory>\/lib\/libmemcached.a -lcrypt -lpthread -lm -lstdc++ -lsasl2#" Makefile

# Resources
---------
 * [Github link] (https://github.com/awslabs/aws-elasticache-cluster-client-memcached-for-php)
 * [AmazonElastiCache Auto Discovery](http://docs.amazonwebservices.com/AmazonElastiCache/latest/UserGuide/AutoDiscovery.html)
 * [php-memcached] (https://github.com/php-memcached-dev/php-memcached)

Dependencies
------------

php-memcached 3.x:
* Supports PHP 7.0 - 7.3.
* Requires libmemcached 1.x or higher.
* Optionally supports igbinary 2.0 or higher.
* Optionally supports msgpack 2.0 or higher.

php-memcached 2.x:
* Supports PHP 5.2 - 5.6.
* Requires libmemcached 0.44 or higher.
* Optionally supports igbinary 1.0 or higher.
* Optionally supports msgpack 0.5 or higher.

[libmemcached](http://libmemcached.org/libMemcached.html) version 1.0.18 or
higher is recommended for best performance and compatibility with memcached
servers.

[igbinary](https://github.com/igbinary/igbinary) is a faster and more compact
binary serializer for PHP data structures. When installing php-memcached from
source code, the igbinary module must be installed first so that php-memcached
can access its C header files. Load both modules in your `php.ini` at runtime
to begin using igbinary.

[msgpack](https://msgpack.org) is a faster and more compact data structure
representation that is interoperable with msgpack implementations for other
languages. When installing php-memcached from source code, the msgpack module
must be installed first so that php-memcached can access its C header files.
Load both modules in your `php.ini` at runtime to begin using msgpack.
