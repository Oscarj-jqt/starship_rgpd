<?php

namespace App\Entity;

use App\Repository\ConsentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsentRepository::class)]
class Consent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $consentType = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isConsented = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $consentedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getConsentType(): ?string
    {
        return $this->consentType;
    }

    public function setConsentType(?string $consentType): static
    {
        $this->consentType = $consentType;

        return $this;
    }

    public function isConsented(): ?bool
    {
        return $this->isConsented;
    }

    public function setIsConsented(?bool $isConsented): static
    {
        $this->isConsented = $isConsented;

        return $this;
    }

    public function getConsentedAt(): ?\DateTimeImmutable
    {
        return $this->consentedAt;
    }

    public function setConsentedAt(?\DateTimeImmutable $consentedAt): static
    {
        $this->consentedAt = $consentedAt;

        return $this;
    }
}
