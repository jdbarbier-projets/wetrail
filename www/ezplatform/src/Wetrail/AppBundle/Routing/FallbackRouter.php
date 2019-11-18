<?php
namespace Wetrail\AppBundle\Routing;

use eZ\Bundle\EzPublishLegacyBundle\Routing\FallbackRouter as LegacyFallbackRouter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class FallbackRouter extends LegacyFallbackRouter
{
    /**
     * @param Request $request
     * @return array
     */
    public function matchRequest(Request $request)
    {
        if (strpos($request->getHost(), 'admin.wetrail') === false)
            throw new ResourceNotFoundException("non non");
        return parent::matchRequest($request);
    }
}

