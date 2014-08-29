#HandlebarsHelpers
===============

I'm collecting here some xamin/handlebars.php helpers that I find useful.

#Installation
Of course, you need (xamin/handlebars)[] to use this helpers.
Fortunately, if you install via composer, dependencies are automatically handled:

    composer require davideorazio/handlebars.php-helpers:dev-master

otherwise, just update your composer.json file:

    {
        "require": {
            ...
            "davideorazio/handlebars.php-helpers": "dev-master",
            ...
        }
    }

and run `composer update`.

#Usage

In order to use the helpers, you need to register them into your Handlebars instance:

    //Use include statements, or use the full namespace and class name below
    use DavideOrazio\HandlebarsHelpers\DateHelper;
    use DavideOrazio\HandlebarsHelpers\StringFormatHelper;
    use DavideOrazio\HandlebarsHelpers\EachUpToHelper;
    use DavideOrazio\HandlebarsHelpers\CountHelper;
    use DavideOrazio\HandlebarsHelpers\VarDumpHelper;

    //Just a instance creation example
    $engine = new Handlebars(array(
                'loader' => new \Handlebars\Loader\FilesystemLoader(array('path/to/folder/one','path/to/folder/two')),
                'partials_loader' => new \Handlebars\Loader\FilesystemLoader(
                    array('path/to/folder/one','path/to/folder/two'),
                    array(
                        'prefix' => '_'
                    )
                )//,
            ));

    //Here you register your helpers
    $engine->addHelper('Date',new DateHelper());
    $engine->addHelper('StringFormat',new StringFormatHelper());
    $engine->addHelper('EachUpTo',new EachUpToHelper());
    $engine->addHelper('Count',new CountHelper());
    $engine->addHelper('VarDump',new VarDumpHelper());

##DateHelper
Formats a date in day-month-year

##StringFormat
A simple wrapper for PHP's `sprintf`.. (currently for one var only)!

{{#StringFormat "your variable string: %s" yourVar}}

##EachUpTo
Allows you to loop through `yourVar`, but specifing a maximum number of items (`upperLimit`)
    {{#EachUpTo yourVar upperLimit}}
    ...
    {{/EachUpTo}}

##Count
Just prints the count of an array
    
    {{#Count yourArray}}

##VarDump
Prints a var_dump of the variable

    {{#VarDump yourVar}}
