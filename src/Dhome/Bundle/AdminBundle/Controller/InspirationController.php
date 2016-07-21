<?php

namespace Dhome\Bundle\AdminBundle\Controller;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;

class InspirationController extends ResourceController
{
    /**
     * @return \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository
     */
    protected function getInspirationRepository()
    {
        return $this->get('dhome.repository.inspiration');
    }

    public function webIndexAction($limit = 12, $currentPage = 1)
    {
        $inspirations = $this->getInspirationRepository()->createPaginator([], ['o.createdAt' => 'desc']);
        $inspirations->setMaxPerPage($limit);

        return $this->render('DhomeWebBundle::web/inspiration.html.twig', [
            'inspirations' => $inspirations,
        ]);
    }

    public function webShowAction($id)
    {
        return $this->render('DhomeWebBundle::web/_inspiration-show.html.twig', [
            'inspiration' => $this->getInspirationRepository()->find($id),
        ]);
    }
}
