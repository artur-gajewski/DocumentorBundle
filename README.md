README
======

What is the DocumentorBundle?
-----------------------------

DocumentorBundle is a bundle for Symfony2 projects that enables generation of the project's documentation with the app/console command, after which documentation is
accessible through the browser by entering the location of the newly generated documentation.


Features
--------

The DocumentorBundle supports the following:

* Generates documentation with a simple console command.
* No need to enter source and target paths.
* Configurable to make sure it only works in your development environment.


Requirements
------------

The DocumentorBundle requires the following:

* PHP 5.3.3 or higher
* [phpDocumentor2](https://github.com/phpDocumentor/phpDocumentor2) 
* The phpdoc command should be callable


Installation
------------

Go to your project directory and add the following line to the "require" list in the composer.json file:

```php
"artur-gajewski/phpdocumentor-bundle": "dev-master"
```

Now run Composer:

```php
php composer.phar install
```

Finally, add the bundle into the AppKernel.php file in your Symfony2 project.

```php
$bundles[] = new \Aga\DocumentorBundle\DocumentorBundle();
```

Thats it! If you wish to install this bundle manually, install the contents of this package into src/Aga/DocumentorBundle folder.


How to use the DocumentorBundle?
--------------------------------

Go to your project root and run the command:

    $ app/console documentation:create

This command will go through your src/ folder and create documentation based on the files within that folder.

Once the generation of documentation is complete, you need to install the assets into the web folder:

    $ app/console assets:install web

Now all you have to do is point your browser to http://www.yourproject.com/documentor/index.html


Contact
-------

To come in contact is really simple and can be done in a variety of ways.

* Twitter: [@GajewskiArtur](http://twitter.com/GajewskiArtur)
* Github: [https://github.com/artur-gajewski](https://github.com/artur-gajewski)
* E-mail:  [info@arturgajewski.com](mailto:info@arturgajewski.com)


Want to contribute?
-------------------

If you want to contribute to this project then just fork it, modify it and send a pull request. It's dead simple!
