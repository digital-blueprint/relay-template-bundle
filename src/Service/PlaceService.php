<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Service;

use Dbp\Relay\TemplateBundle\Entity\Place;

class PlaceService
{
    public function setConfig(array $config): void
    {
    }

    public function getPlace(string $identifier, array $filters = [], array $options = []): ?Place
    {
        return null;
    }

    /**
     * @return Place[]
     */
    public function getPlaces(int $currentPageNumber, int $maxNumItemsPerPage, array $filters, array $options): array
    {
        return [];
    }

    public function addPlace(Place $data): Place
    {
        return $data;
    }

    public function removePlace(Place $data): void
    {
    }
}
