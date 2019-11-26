<?php

namespace Wetrail\AppBundle\Controller\ContentViewController;
use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

class HomepageController extends Controller
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
        $searchService = $this->getRepository()->getSearchService();

        $query = new LocationQuery();
        $query->filter = new Criterion\LogicalAnd(
            array(
                new Criterion\ParentLocationId( 2 ),
                new Criterion\ContentTypeIdentifier( "rubric_trainings" ),
                new Criterion\Visibility(Criterion\Visibility::VISIBLE)
            )
        );
        $query->sortClauses = [
            new SortClause\Location\Priority(Query::SORT_DESC),
        ];
        $query->performCount = false;
        $query->limit = 10;
        $results = $searchService->findLocations($query);
        $items = [];
        foreach ($results->searchHits as $item) {
            $items[] = $item->valueObject;
        }

        return $view;
    }
}