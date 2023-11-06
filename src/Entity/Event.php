<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $event_id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start_time = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end_time = null;

    #[ORM\ManyToOne(inversedBy: 'events', targetEntity: Intake::class)]
    #[ORM\JoinColumn(name: 'intake_id', referencedColumnName: 'intake_id')]
    private ?Intake $intake = null;

    #[ORM\ManyToOne(inversedBy: 'events', targetEntity: Sysuser::class)]
    #[ORM\JoinColumn(name: 'sysuser_id', referencedColumnName: 'sysuser_id')]
    private ?Sysuser $sysuser = null;
    //Adding event color
    #[ORM\Column(type: 'string', length: 7)]
    private ?string $eventColor = null;


    public function getEventId(): ?int
    {
        return $this->event_id;
    }

    public function setEventId(int $event_id): static
    {
        $this->event_id = $event_id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->start_time;
    }

    public function setStartTime(\DateTimeInterface $start_time): static
    {
        $this->start_time = $start_time;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->end_time;
    }

    public function setEndTime(\DateTimeInterface $end_time): static
    {
        $this->end_time = $end_time;

        return $this;
    }

    public function getIntake(): ?Intake
    {
        return $this->intake;
    }

    public function setIntake(?Intake $intake): static
    {
        $this->intake = $intake;

        return $this;
    }

    public function getSysuser(): ?Sysuser
    {
        return $this->sysuser;
    }

    public function setSysuser(?Sysuser $sysuser): static
    {
        $this->sysuser = $sysuser;

        return $this;
    }
    //Adding color getter and setter
    public function getEventColor(): ?string
    {
        return $this->eventColor;
    }

    public function setEventColor(string $eventColor): self
    {
        $this->eventColor = $eventColor;

        return $this;
    }
}
