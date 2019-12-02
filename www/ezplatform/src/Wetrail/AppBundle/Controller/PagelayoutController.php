<?php

namespace Wetrail\AppBundle\Controller;
use eZ\Bundle\EzPublishCoreBundle\Controller;
use Wetrail\AppBundle\Service\FetchHelper;

/**
 * Controlleur qui gère l'affichage des composants du pagelayout.
 */
class PagelayoutController extends Controller
{
    CONST MENU_CLASSES = array(
            'rubric_trails',
            'rubric_equipments',
            'rubric_trainings',
            'rubric_nutrition'
        );
    CONST SUBMENU_CLASSES = array(
            'rubric_itineraries',
            'rubric_races',
            'rubric_shoes',
            'rubric_clothes',
            'rubric_accessories',
            'subrubric',
            'rubric_recipes'
        );
    protected $fetchHelper;

    public function __construct(FetchHelper $fetchHelper)
    {
        $this->fetchHelper = $fetchHelper;
    }

    /**
     * Action qui sert le footer du site.
     */
    public function footerAction(  )
    {
        $firstLevelMenuItems = $this->fetchHelper->fetchChildren( $this->getRootLocation()->id, self::MENU_CLASSES, 4);
        $aboutUsPage = $this->fetchHelper->fetchChildren( $this->getRootLocation()->id,  "about_us", 1);


        $params = [
            "firstLevelMenuItems" => $firstLevelMenuItems,
            "aboutUsPage" => $aboutUsPage[0]
        ];
        return $this->render("@ezdesign/pagelayout/footer.html.twig", $params);
    }
    /**
     * Action qui sert le menu du site
     *
     */
    public function menuAction()
    {
        $firstLevelMenuItems = $this->fetchHelper->fetchChildren( $this->getRootLocation()->id, self::MENU_CLASSES, 4);
        $secondLevelMenuItems = array();
        foreach ( $firstLevelMenuItems as $firstLevelMenu) {
            $secondLevelMenuItems [$firstLevelMenu->id] = $this->fetchHelper->fetchChildren($firstLevelMenu->id,self::SUBMENU_CLASSES, 4);
        }

        $params = [
            "firstLevelMenuItems" => $firstLevelMenuItems,
            "secondLevelMenuItems" => $secondLevelMenuItems
        ];
        return $this->render("@ezdesign/pagelayout/menu.html.twig", $params);
    }
}