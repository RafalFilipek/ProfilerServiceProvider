<?php

namespace Rafal\ProfilerExtension;

use Silex\Application;
use Silex\ExtensionInterface;
use Rafal\ProfilerExtension\Twig\ProfilerExtension as TwigProfileExtension;
use \ArrayObject;
use Symfony\Component\HttpFoundation\Cookie;

class ProfilerExtension implements ExtensionInterface {
    
    public function register(Application $app)
    {
        if (!$app['profiler.data_url']) {
            $app['profiler.data_url'] = '/__fetch_profiler_data';
        }
        if (!$app['profiler.cookie_name']) {
            $app['profiler.cookie_name'] = 'web_profiler';
        }
        $app->get($app['profiler.data_url'], function() use($app){
            $data = unserialize(urldecode($app['request']->cookies->get($app['profiler.cookie_name'])));
            return $app['twig']->render('__profiler-data.twig', array(
                'data' => $data
            ));
        });

        $app['twig.loader']->addPath(__DIR__.'/Resources/views/');

        $app['dispatcher']->addListener('silex.after', function($event) use($app) {
            $data = array();
            $request = $event->getRequest();
            $response = $event->getResponse();
            $data['request'] = array(
                'method'            => $request->getMethod(),
                'uri'               => $request->getRequestUri(),
                'format'            => $request->getRequestFormat(),
                'accept'            => $request->headers->get('accept'),
                'accept-charset'    => $request->headers->get('accept-charset'),
                'accept-encoding'   => $request->headers->get('accept-encoding'),
                'accept-language'   => $request->headers->get('accept-language'),
                'connection'        => $request->headers->get('connection'),
                'host'              => $request->headers->get('host'),
                'user-agent'        => $request->headers->get('user-agent'),
            );
            $data['response'] = array(
                'code'          => $response->getStatusCode(),
                'cache-control' => $response->headers->get('cache-control')
            );
            $event->getResponse()->headers->setCookie(new Cookie($app['profiler.cookie_name'], urlencode(serialize($data))));
        });

        $app['twig']->addExtension(new TwigProfileExtension($app['twig']));

    }
}