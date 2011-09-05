<?php

namespace Rafal\ProfilerExtension\Twig;

class ProfilerExtension extends \Twig_Extension {
    
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function getFunctions()
    {
        return array(
            'profiler'  => new \Twig_Function_Method($this, 'getProfiler', array('is_safe' => array('html')))
        );
    }

    public function getProfiler()
    {
        return $this->twig->render('__profiler-panel.twig', array(
            'data' => array('foo' => 'bar')
        ));
    }

    public function getName()
    {
        return 'profiler';
    }


}