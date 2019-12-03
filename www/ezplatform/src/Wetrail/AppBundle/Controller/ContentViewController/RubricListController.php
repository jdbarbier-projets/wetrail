<?php

namespace Wetrail\AppBundle\Controller\ContentViewController;
use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;
use Wetrail\AppBundle\Service\FetchHelper;

class RubricListController extends Controller
{
    CONST SUBRUBRIC_CLASSES = array(
        'rubric_itineraries',
        'rubric_races',
        'rubric_shoes',
        'rubric_clothes',
        'rubric_accessories',
        'rubric_advises',
        'subrubric',
        'rubric_recipes'
    );
    CONST ARTICLES_CLASSES = array(
        'article',
        'race',
        'itinerary',
        'recipe',
        'test_accessory',
        'test_shoe',
        'test_clothe'
    );
    CONST MAIN_RUBRIC_CLASSES = array(
        'rubric_trails',
        'rubric_equipments',
        'rubric_trainings',
        'rubric_nutrition'
    );
    protected $fetchHelper;

    public function __construct(FetchHelper $fetchHelper)
    {
        $this->fetchHelper = $fetchHelper;
    }

    /**
     * Action qui sert la vue "full" des contenus de toutes les pages "liste"
     *
     * @param ContentView $view
     *
     * @return ContentView
     */
    public function fullAction(ContentView $view)
    {
        $mainRubric = $this->fetchHelper->getMainRubric( $view->getLocation(), self::MAIN_RUBRIC_CLASSES);
        $subRubricList = $this->fetchHelper->fetchChildren( $mainRubric->id, self::SUBRUBRIC_CLASSES);
        $articlesList = $this->fetchHelper->fetchDescendants( $view->getLocation(),  self::ARTICLES_CLASSES);

        $params = [
            "mainRubric" => $mainRubric,
            "subRubricList" => $subRubricList,
            "articlesList" => $articlesList
        ];

        // Set custom header for the Response
        //$response = new Response();
        //$response->headers->add(['X-Hello' => 'World']);
        //$view->setResponse($response);

        $view->addParameters( $params );
        return $view;
    }
}