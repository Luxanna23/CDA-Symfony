<?php

namespace App\Entity;

use App\Repository\DemandeReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeReservationRepository::class)]
class DemandeReservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reservation = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $Etat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservation(): ?string
    {
        return $this->reservation;
    }

    public function setReservation(string $reservation): static
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->Etat;
    }

    public function setEtat(?int $Etat): static
    {
        $this->Etat = $Etat;

        return $this;
    }
}
