<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Rest;

use Dbp\Relay\CoreBundle\Rest\AbstractDataProvider;
use Dbp\Relay\TemplateBundle\Entity\Place;
use Dbp\Relay\TemplateBundle\Service\PlaceService;

/**
 * @extends AbstractDataProvider<Place>
 */
class PlaceProvider extends AbstractDataProvider
{
    private PlaceService $placeService;

    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }

    protected function getItemById(string $id, array $filters = [], array $options = []): ?object
    {
        return $this->placeService->getPlace($id, $filters, $options);
    }

    protected function getPage(int $currentPageNumber, int $maxNumItemsPerPage, array $filters = [], array $options = []): array
    {
        return $this->placeService->getPlaces($currentPageNumber, $maxNumItemsPerPage, $filters, $options);
    }

    protected function isUserGrantedOperationAccess(int $operation): bool
    {
        return $this->isAuthenticated();
    }
}
