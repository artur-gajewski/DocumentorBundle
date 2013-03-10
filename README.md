README
======

What is DocumentorBundle?
-------------------------

DocumentorBundle is a Symfony2 bundle that wraps [phpDocumentor2](https://github.com/phpDocumentor/phpDocumentor2) to generate your project's documentation.


Basic Usage
-----------

1. Install and enable the bundle for your project's development environment
2. Run `app/consoledocumentation:create` to generate the documentation for files located in `./src`
3. Your project documentation is now available at `web/bundles/documentor` or http://yourproject.dev/app\_dev.php/bundles/documentor/index.html


Features
--------

DocumentorBundle boasts the following features:

* Generates documentation with a simple console command.
* No need to enter source and target paths.
* Configurable to make sure it only works in your development environment.


Requirements
------------

DocumentorBundle requires the following:

* PHP 5.3.3 or higher
* [phpDocumentor2](https://github.com/phpDocumentor/phpDocumentor2) 
* phpDocumentor2 should be callable as `phpdoc` from the CLI


Installation
------------

The suggested install method is via [Composer](http://getcomposer.org)

1. Add DocumentorBundle to your `composer.json` file:

    ```js
    {
        "require-dev": {
            "artur-gajewski/phpdocumentor-bundle": "dev-master"
        }
    }
    ```

2. Tell Composer to update this bundle:

    ```bash
    php composer.phar update artur-gajewski/phpdocumentor-bundle
    ```

3. Enable the bundle for your development environment:

    ```php
    // app/AppKernel.php

        public function registerBundles()
        {
            // Register normal bundles

            if (in_array($this->getEnvironment(), array('dev', 'test'))) {
                // ...
                $bundles[] = new Aga\DocumentorBundle\DocumentorBundle();
            }
        }
    ```


How to use DocumentorBundle?
----------------------------

Go to your project root and generate the documentation using the bundle's built-in DocumentorCommand:

```bash
$ app/console documentation:create
```

This command will generate documentation for all files in the `src/` directory.

After generating the documentation, the command executes `app/console assets:install` to copy the newly generated documentation to `web/bundles/documentor`, where you can access it from disk or via your project's website at http://yourproject.dev/app_dev.php/bundles/documentor/index.html


Contact
-------

* Twitter: [@GajewskiArtur](http://twitter.com/GajewskiArtur)
* Github: <https://github.com/artur-gajewski>
* E-mail:  [info@arturgajewski.com](mailto:info@arturgajewski.com)


Want to contribute?
-------------------

If you want to contribute to this project then just fork it, modify it and send a pull request. It's dead simple!
