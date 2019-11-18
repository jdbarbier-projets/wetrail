<?php

namespace Wetrail\AppBundle\Controller;

use Symfony\Bundle\TwigBundle\Controller\ExceptionController as BaseExceptionController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\FlattenException;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Twig\Environment;

class ExceptionController extends BaseExceptionController
{
    protected $twig;
    protected $debug;

    /**
     * Chaîne de provider de tracking Xiti
     *
     * @var TrackingProviderChain
     */
    protected $trackingProviderChain;

    /**
     * @param Environment $twig
     * @param bool        $debug Show error (false) or exception (true) pages by default
     * @param TrackingProviderChain $trackingProviderChain
     */
    public function __construct(Environment $twig, $debug, $trackingProviderChain)
    {
        $this->twig = $twig;
        $this->debug = $debug;
        $this->trackingProviderChain = $trackingProviderChain;
    }

    /**
     * {@inheritdoc}
     */
    public function showAction(Request $request, FlattenException $exception, DebugLoggerInterface $logger = null)
    {
        $currentContent = $this->getAndCleanOutputBuffering($request->headers->get('X-Php-Ob-Level', -1));
        $showException = $request->attributes->get('showException', $this->debug); // As opposed to an additional parameter, this maintains BC

        $code = $exception->getStatusCode();

        $trackingParameters = $this->trackingProviderChain->getDefaultProvider()->getTrackingParameters();
        $trackingParameters["page_error"] = $code;

        return new Response($this->twig->render(
            (string) $this->findTemplate($request, $request->getRequestFormat(), $code, $showException),
            array(
                'status_code' => $code,
                'status_text' => isset(Response::$statusTexts[$code]) ? Response::$statusTexts[$code] : '',
                'exception' => $exception,
                'logger' => $logger,
                'currentContent' => $currentContent,
                'trackingParameters' => $trackingParameters,
            )
        ), 200, array('Content-Type' => $request->getMimeType($request->getRequestFormat()) ?: 'text/html'));
    }
}
