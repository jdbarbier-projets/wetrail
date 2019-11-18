<?php

namespace Wetrail\AppBundle\Controller;

use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\API\Repository\Exceptions\NotFoundException;
use eZ\Publish\API\Repository\Exceptions\UnauthorizedException;
use eZ\Publish\API\Repository\Values\Content\Content;
use eZ\Publish\API\Repository\Values\Content\Location;
use Symfony\Component\HttpFoundation\Response;
use eZ\Publish\Core\MVC\Symfony\Routing\RouteReference;

/**
 * Controlleur qui gère l'affichage des composants du pagelayout.
 */
class PagelayoutController extends Controller
{
    /**
     * Action qui sert le top header du site.
     *
     * @param boolean $transparent Si true, alors le header sera transparent
     * @param string $campingName Le camping a passer au formulaire de contact
     *
     * @return Response
     */
    public function headerTopAction($transparent = false, $campingName = false, $camping = null, $withoutHeaderLink = false, $backLinkId = null)
    {

        return $this->render("@ezdesign/pagelayout/header_top.html.twig", $params);
    }

    /**
     * Action qui sert le footer du site.
     *
     * @param Location $location
     * @param RouteReference $routeRef
     *
     * @return Response
     */
    public function footerAction(Location $location = null, RouteReference $routeRef = null, Content $camping = null)
    {
    }

    /**
     * Action qui sert le menu déroulant du site
     *
     * @param null $campingContentId
     * @return Response
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException
     */
    public function menuAction($campingContentId = null)
    {
    }

    /**
     * @return Response
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException
     */
    public function cookiesBannerAction() {
    }
}