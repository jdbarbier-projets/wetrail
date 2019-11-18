<?php

namespace Wetrail\AppBundle\Controller\ContentViewController;

use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;

class DiaporamaController extends Controller
{
    use HelperGetter;

    /**
     * Vue bloc des diaporama
     * Le paramtre  lite permet un affichage particulier
     *
     * @param ContentView $view
     * @param array $parameters
     * @return void
     */
    public function blockAction(ContentView $view, array $parameters = null)
    {
        $blockHelper = $this->getBlockHelper();
        $view->addParameters([
            'imageContents' => $blockHelper->getDiaporamaImageContents($view->getLocation())
        ]);

        // Mode lite de la vue block
        if ($parameters and array_key_exists('lite', $parameters)) {
            $view->addParameters(['lite' => $parameters['lite']]);
        }

        return $view;
    }
}
