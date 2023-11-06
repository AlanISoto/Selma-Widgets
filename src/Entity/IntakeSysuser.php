<?php

namespace App\Entity;

use App\Repository\IntakeSysuserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntakeSysuserRepository::class)]
class IntakeSysuser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $intake_sysuser_id = null;

    #[ORM\ManyToOne(targetEntity: Intake::class)]
    #[ORM\JoinColumn(name: "intake_id", referencedColumnName: "intake_id", nullable: false)]
    private ?Intake $intake = null;

    #[ORM\ManyToOne(targetEntity: Sysuser::class)]
    #[ORM\JoinColumn(name: "sysuser_id", referencedColumnName: "sysuser_id", nullable: false)]
    private ?Sysuser $sysuser = null;

    public function getIntakeSysuserId(): ?int
    {
        return $this->intake_sysuser_id;
    }

    public function setIntakeSysuserId(int $intake_sysuser_id): self
    {
        $this->intake_sysuser_id = $intake_sysuser_id;

        return $this;
    }

    public function getIntake(): ?Intake
    {
        return $this->intake;
    }

    public function setIntake(?Intake $intake): self
    {
        $this->intake = $intake;

        return $this;
    }

    public function getSysuser(): ?Sysuser
    {
        return $this->sysuser;
    }

    public function setSysuser(?Sysuser $sysuser): self
    {
        $this->sysuser = $sysuser;

        return $this;
    }
}
