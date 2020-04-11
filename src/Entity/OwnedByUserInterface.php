<?php

namespace App\Entity;

interface OwnedByUserInterface
{
    function getOwner(): ?User;
    function setOwner(?User $owner): OwnedByUserInterface;
}
