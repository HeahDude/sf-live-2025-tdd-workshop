<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
#[ORM\Table('players')]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    private int $honorPoints = 0;

    public function __construct(
        #[ORM\Column(unique: true)]
        public string $nickname,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHonorPoints(): int
    {
        return $this->honorPoints;
    }

    public function addHonorPoint(): void
    {
        $this->honorPoints++;
    }
}
