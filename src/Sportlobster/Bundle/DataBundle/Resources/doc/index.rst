SportlobsterDataBundle
====================

Introduction
--------------------

This bundle allowed your website to get Data from any platform you want. 

Technical Process
--------------------

A DataManager_. is declared as an abstract class.
It will be mainly composed by a DataLoader_ service, and an abstract method load.
The DataLoader is used to make request to plateform where are stored the required Data. Plateform informations have to formatted as XML file.

For example, let's say we want to create a News Manager that displays news from some RSS feed.
A NewsManager_ is created, where the load method is implemented to create a collection_ of News_ coming from plateform described in this file_.

Key Features include:

- multi protocol allowed (HTTP, FTP...)
- multi Data response from request can be handle (XML or JSON)
- new object like News can be easily created
- phpunit test
- behat test will be included in next feature

.. _DataManager: https://github.com/lechatquidanse/data-dealer-sandbox/blob/master/src/Sportlobster/Bundle/DataBundle/Manager/DataManager.php
.. _DataLoader: https://github.com/lechatquidanse/data-dealer-sandbox/blob/master/src/Sportlobster/Bundle/DataBundle/Loader/DataLoader.php
.. _NewsManager: https://github.com/lechatquidanse/data-dealer-sandbox/blob/master/src/Sportlobster/Bundle/DataBundle/Manager/NewsManager.php
.. _collection: https://github.com/lechatquidanse/data-dealer-sandbox/blob/master/src/Sportlobster/Bundle/DataBundle/Collection/DataCollection.php
.. _News: https://github.com/lechatquidanse/data-dealer-sandbox/blob/master/src/Sportlobster/Bundle/DataBundle/Model/News.php
.. _file: https://github.com/lechatquidanse/data-dealer-sandbox/blob/master/src/Sportlobster/Bundle/DataBundle/Resources/data/flux/newsFlux.xml
