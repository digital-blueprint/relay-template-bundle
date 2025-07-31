<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Rest;

use Dbp\Relay\CoreBundle\Rest\AbstractDataProcessor;
use Dbp\Relay\TemplateBundle\Entity\Place;
use Dbp\Relay\TemplateBundle\Service\PlaceService;

class PlaceProcessor extends AbstractDataProcessor
{
    private PlaceService $placeService;

    public function __construct(PlaceService $placeService)
    {
        parent::__construct();
        $this->placeService = $placeService;
    }

    protected function addItem(mixed $data, array $filters): Place
    {
        assert($data instanceof Place);

        $data->setIdentifier('42');

        return $this->placeService->addPlace($data);
    }

    protected function removeItem($identifier, $data, array $filters): void
    {
        assert($data instanceof Place);

        $this->placeService->removePlace($data);
    }
}
