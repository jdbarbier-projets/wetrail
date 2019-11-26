<?php

namespace Wetrail\AppBundle\Controller\ContentViewController;
use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;

class TestShoeController extends Controller
{
    /**
     * Action qui sert la vue "full" des contenus de type "Homepage"
     *
     * @param ContentView $view
     *
     * @return ContentView
     */
    public function fullAction(ContentView $view)
    {
        return $view;
    }
}