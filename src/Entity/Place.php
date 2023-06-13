<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

class Place
{
    private $identifier;

    /**
     * @Groups({"TemplatePlace:output", "TemplatePlace:input"})
     *
     * @var string
     */
    private $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }
}
