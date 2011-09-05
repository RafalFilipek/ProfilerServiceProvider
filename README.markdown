Profiler Extension
==================
Profier Extension is something like Profiler in Symfony :) Not so powerfull but still alows you to inspect informations about ```Request```, ```Response```, ```View```etc.


Installation (clone)
------------
    cd /path/to/your/project
    git clone git@github.com:RafalFilipek/ProfilerExtension.git vendor/rafal/src/Rafal/ProfilerExtension

Installation (submodule)
------------------------
    cd /path/to/your/project
    git submodule add git@github.com:RafalFilipek/ProfilerExtension.git vendor/rafal/src/Rafal/ProfilerExtension

Registering
-----------
    $app['autoloader']->registerNamespace('Rafal', __DIR__.'/vendor/rafal/src');
    $app->register(new Rafal\ProfilerExtension\ProfilerExtension());

Options
-------
Not yet.

Example
-------
While Profiler is still under early development it can't display any informations. But you can include it into your project and see how it will ( probably ) look like. 

    $app['autoloader']->registerNamespace('Rafal', __DIR__.'/vendor/rafal/src');
    $app->register(new Rafal\ProfilerExtension\ProfilerExtension());
    
Now you can add in your layout befoe ```<\body>```

    {{ profiler() }}    

You should see little box with alpha sign - just click it.


License
-------
Memcache Extension is licensed under the MIT license.