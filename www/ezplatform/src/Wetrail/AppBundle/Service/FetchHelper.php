<?php

namespace Wetrail\AppBundle\Service;

use eZ\Publish\API\Repository\ContentService;
use eZ\Publish\API\Repository\LocationService;
use eZ\Publish\API\Repository\Repository;
use eZ\Publish\API\Repository\SearchService;
use eZ\Publish\API\Repository\Values\Content\Location;
use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

class FetchHelper
{
    protected $repository;
    protected $searchService;

    CONST MAX_LIMIT = 999999;

    public function __construct(Repository $repository, SearchService $searchService, LocationService $locationService, ContentService $contentService)
    {
        $this->repository = $repository;
        $this->searchService = $searchService;
        $this->locationService = $locationService;
        $this->contentService = $contentService;
    }

    /**
     * @param $parentLocationID
     * @param $limit
     * @param $classesList
     * @param int $depth
     *
     * @return Location[]
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException
     */
    public function fetchChildren($parentLocationID, $classesList, $limit = self::MAX_LIMIT)
    {
        $query = new LocationQuery();
        $query->filter = new Criterion\LogicalAnd(
            array(
                new Criterion\ParentLocationId( $parentLocationID ),
                new Criterion\ContentTypeIdentifier( $classesList ),
                new Criterion\Visibility(Criterion\Visibility::VISIBLE)
            )
        );
        $query->sortClauses = [
            new SortClause\Location\Priority(Query::SORT_DESC),
        ];
        $query->performCount = false;
        $query->limit = $limit;
        $results = $this->searchService->findLocations($query);
        $items = [];
        foreach ($results->searchHits as $item) {
            $items[] = $item->valueObject;
        }
        return $items;
    }

    /**
     * @param Location $location
     * @param $limit
     * @param $classesList
     * @param int $depth
     *
     * @return Location[]
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException
     */
    public function fetchDescendants($location, $classesList, $limit = self::MAX_LIMIT)
    {
        $query = new LocationQuery();
        $query->filter = new Criterion\LogicalAnd(
            array(
                new Criterion\Subtree( $location->pathString ),
                new Criterion\ContentTypeIdentifier( $classesList ),
                new Criterion\Visibility(Criterion\Visibility::VISIBLE)
            )
        );
        $query->sortClauses = [
            new SortClause\Location\Priority(Query::SORT_DESC),
        ];
        $query->performCount = false;
        $query->limit = $limit;
        $results = $this->searchService->findLocations($query);
        $items = [];
        foreach ($results->searchHits as $item) {
            $items[] = $item->valueObject;
        }
        return $items;
    }

    /**
     * @param Location $currentLocation
     * @param array $mainRubricClassesList
     *
     * @return Location
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException
     */
    public function getMainRubric($currentLocation, $mainRubricClassesList)
    {
        $mainRubric = $currentLocation;
        $currentContent = $this->contentService->loadContentByContentInfo( $currentLocation->getContentInfo() );
        if ( !in_array( $currentContent->getContentType()->identifier, $mainRubricClassesList )) {
            $mainRubric = $this->locationService->loadLocation( $currentLocation->parentLocationId );
        }
        return $mainRubric;
    }
}