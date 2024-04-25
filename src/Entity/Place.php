<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Dbp\Relay\TemplateBundle\Rest\PlaceProcessor;
use Dbp\Relay\TemplateBundle\Rest\PlaceProvider;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    shortName: 'TemplatePlace',
    types: ['https://schema.org/Place'],
    operations: [
        new Get(
            uriTemplate: '/template/places/{identifier}',
            openapiContext: [
                'tags' => ['Template'],
            ],
            provider: PlaceProvider::class
        ),
        new GetCollection(
            uriTemplate: '/template/places',
            openapiContext: [
                'tags' => ['Template'],
            ],
            provider: PlaceProvider::class
        ),
        new Post(
            uriTemplate: '/template/places',
            openapiContext: [
                'tags' => ['Template'],
                'requestBody' => [
                    'content' => [
                        'application/ld+json' => [
                            'schema' => [
                                'type' => 'object',
                                'properties' => [
                                    'name' => ['type' => 'string'],
                                ],
                                'required' => ['name'],
                            ],
                            'example' => [
                                'name' => 'Example Name',
                            ],
                        ],
                    ],
                ],
            ],
            processor: PlaceProcessor::class
        ),
        new Delete(
            uriTemplate: '/template/places/{identifier}',
            openapiContext: [
                'tags' => ['Template'],
            ],
            provider: PlaceProvider::class,
            processor: PlaceProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['TemplatePlace:output']],
    denormalizationContext: ['groups' => ['TemplatePlace:input']]
)]
class Place
{
    #[ApiProperty(identifier: true)]
    #[Groups(['TemplatePlace:output'])]
    private ?string $identifier = null;

    #[ApiProperty(iris: ['https://schema.org/name'])]
    #[Groups(['TemplatePlace:output', 'TemplatePlace:input'])]
    private ?string $name;

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): void
    {
        $this->identifier = $identifier;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
