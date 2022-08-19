<?php

namespace RPAPP\Traits;

trait WithFullLoader
{
    public ?string $fullLoaderMessage = null;

    public function setFullLoaderMessage(string $fullLoaderMessage)
    {
        return $this->fullLoaderMessage = $fullLoaderMessage;
    }

    public function getFullLoaderMessage(): ?string
    {
        return $this->fullLoaderMessage;
    }
}
