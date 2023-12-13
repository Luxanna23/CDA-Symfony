<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $reservation = null;

    #[ORM\Column]
    private ?bool $etat = null;

    #[ORM\Column]
    private ?int $id_client_fk = null;

    #[ORM\Column]
    private ?int $id_chambre_fk = null;

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

    public function isEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdClientFk(): ?int
    {
        return $this->id_client_fk;
    }

    public function setIdClientFk(int $id_client_fk): static
    {
        $this->id_client_fk = $id_client_fk;

        return $this;
    }

    public function isIdChambreFk(): ?int
    {
        return $this->id_chambre_fk;
    }

    public function setIdChambreFk(int $id_chambre_fk): static
    {
        $this->id_chambre_fk = $id_chambre_fk;

        return $this;
    }
}
