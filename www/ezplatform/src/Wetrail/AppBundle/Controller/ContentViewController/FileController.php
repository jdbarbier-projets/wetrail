<?php

namespace WeTrail\AppBundle\Controller\ContentViewController;

use Symfony\Component\HttpFoundation\Response;
use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;


class FileController extends Controller
{
    /**
     * Action qui redirige vers le lien de téléchargement des contenus de type "file"
     *
     * @param integer $locationId
     * @param string $viewType
     * @param boolean $layout
     * @param array $params
     * @return Response
     */
    public function downloadAction(ContentView $view)
    {
        // On récupère le contenu du fichier (car on ne vas pas utiliser de viewLocation/viewContent)
        $content = $view->getContent();

        // On récupère le fichier
        $contentFileValue = $content->getFieldValue('file');

        // On redirige vers la génération d'URL de téléchargement de eZ
        return $this->forward('ezpublish.controller.content.download:downloadBinaryFileAction', array(
            'contentId' => $content->id,
            'fieldIdentifier' => 'file',
            'filename' => $contentFileValue->fileName
        ));
    }
}