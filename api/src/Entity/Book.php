<?php

namespace Books\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use Books\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ApiResource()]
#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ApiProperty(identifier: true, types: ['https://schema.org/identifier'])]
    private ?Uuid $id = null;

    #[ApiProperty(
        example: 'The art of Computer Programming',
        iris: ['https://schema.org/name']
    )]
    #[ORM\Column(type: Types::TEXT)]
    public ?string $title = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }
}