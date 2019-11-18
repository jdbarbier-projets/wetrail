<?php

namespace Wetrail\AppBundle\Controller\ContentViewController;

use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;

/**
 * Controlleur qui sert les vues des contenus de type "Article"
 */
class ArticleController extends Controller
{
    use HelperGetter;

    /**
     * Sert la vue full des contenus de type "article"
     *
     * @param ContentView $view
     *
     * @return ContentView
     */
    public function fullAction(ContentView $view)
    {
        $blocks = $this->getBlockHelper()->getBlocks($view->getLocation());
        $view->addParameters([
            'blocks' => $blocks
        ]);
        return $view;
    }
}