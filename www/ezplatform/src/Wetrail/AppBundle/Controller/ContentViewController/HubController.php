<?php

namespace Wetrail\AppBundle\Controller\ContentViewController;

use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;

/**
 * Controlleur qui sert les vues des contenus de type "Hub" (Liste de pays, Liste de régions etc...)
 */
class HubController extends Controller
{
    /**
     * Sert la vue full des contenus de type "countries", "regions, "cities" ...
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