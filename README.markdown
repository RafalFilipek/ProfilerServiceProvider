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
    $app->register(new Rafal\ProfilerExtension\ProfilerExtension(), array(
        'profiler.data_url' => '__fetch_profiler_data',
        'profiler.cookie_name' => 'webprofiler'
    ));

Options
-------
* ```profiler.data_url``` - internal extension url. Just make sure that its not in collision with your other routes. Default ```__fetch_profiler_data```.
* ```profiler.cookie_name``` - in this cookie profiler will store data between requests. Just make sure that its not in collision with your other cookies. Default ```webprofiler```.

Example
-------
First register extension in your app.

    $app['autoloader']->registerNamespace('Rafal', __DIR__.'/vendor/rafal/src');
    $app->register(new Rafal\ProfilerExtension\ProfilerExtension());
    
Now you can add in your layout before ```<\body>```

    {{ profiler() }}    

You should see little box with alpha sign - just click it.

Example output
--------------
![Example](http://i52.tinypic.com/2ylmipx.png)

License
-------
Memcache Extension is licensed under the MIT license.
