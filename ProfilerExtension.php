<?php

namespace Rafal\ProfilerExtension;

use Silex\Application;
use Silex\ExtensionInterface;
use Rafal\ProfilerExtension\Twig\ProfilerExtension as TwigProfileExtension;

class ProfilerExtension implements ExtensionInterface {
    
    public function register(Application $app)
    {
        $app->get('/foo', function() use($app){
            return $app['twig']->render('__profiler-panel.twig');
        });

        $app['twig.loader']->addPath(__DIR__.'/Resources/views/');
        $app['twig']->addExtension(new TwigProfileExtension($app['twig']));

        $app['profiler'] = $app->share(function() use($app) {
            // TODO :)
        });
    }
}