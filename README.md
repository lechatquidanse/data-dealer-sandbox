Data-Dealer-sandbox
========================

This sandbox display data on webpage from sources (such as rss feed, etc...).
Based on the latest symfony2 edition, it includes a vagrant environnement, unit tests and functionnal tests.
For the moment it displays news from rss feeds that are defined in [this xml file][1].
You can find more technical informations [here][2].

1) Installing
----------------------------------

When it comes to installing the Symfony Standard Edition, you have the
following options.

### Clone the repository

    git clone https://github.com/lechatquidanse/data-dealer-sandbox.git
    
### Vagrant Environnement

The vagrant proposed here is the vagrant developped by [kleiram/vagrant-symfony][3].
To use it, follow [this instructions][4] 

### Use Composer to install vendors

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then, use the `composer` command to install required vendors:

    php composer.phar install


2) Browsing the data-dealer Application
--------------------------------

Congratulations! You're now ready to use the website.
You can go to [http://192.168.33.10/][5] or the vhost that you use.

Enjoy!

[1]:  https://github.com/lechatquidanse/data-dealer-sandbox/blob/master/src/Sportlobster/Bundle/DataBundle/Resources/data/flux/newsFlux.xml
[2]:  https://github.com/lechatquidanse/data-dealer-sandbox/blob/master/src/Sportlobster/Bundle/DataBundle/Resources/doc/index.rst
[3]:  https://github.com/kleiram/vagrant-symfony
[4]:  https://github.com/lechatquidanse/data-dealer-sandbox/blob/master/vagrant/README.md
[5]:  http://192.168.33.10/

Authors
-------

* Stéphane EL MANOUNI