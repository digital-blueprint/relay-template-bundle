<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

class Place
{
    /**
     * @Groups({"TemplatePlace:output"})
     */
    private ?string $identifier = null;

    /**
     * @Groups({"TemplatePlace:output", "TemplatePlace:input"})
     */
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
