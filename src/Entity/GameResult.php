<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('game_results')]
class GameResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    public function __construct(
        #[ORM\ManyToOne]
        #[ORM\JoinColumn(nullable: false)]
        public readonly Player $player,
        #[ORM\Column]
        public readonly bool $victory,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
