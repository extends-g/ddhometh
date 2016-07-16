<?php

namespace Dhome\Bundle\AdminBundle\Controller;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;

class VisionController extends ResourceController
{
    /**
     * @return \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository
     */
    protected function getVisionRepository()
    {
        return $this->get('dhome.repository.vision');
    }

    public function webIndexAction($limit = 12, $currentPage = 1)
    {
        $visions = $this->getVisionRepository()->createPaginator([], ['o.createdAt' => 'desc']);
        $visions->setMaxPerPage($limit);

        return $this->render('DhomeWebBundle::web/inspiration.html.twig', [
            'inspirations' => $visions,
        ]);
    }

    public function webShowAction($id)
    {
        return $this->render('DhomeWebBundle::web/_inspiration-show.html.twig', [
            'inspiration' => $this->getVisionRepository()->find($id),
        ]);
    }
}
