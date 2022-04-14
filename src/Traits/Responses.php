<?php

namespace App\Traits;

trait Responses
{
    public ?string $code = null;
    public ?string $message = null;
    public ?string $logMessage = null;
    public ?string $timestamp = null;
    public ?string $file = null;
    public ?string $line = null;
    public ?string $trace = null;
}