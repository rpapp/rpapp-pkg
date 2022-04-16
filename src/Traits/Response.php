<?php

namespace RPAPP\Traits;

trait Response
{
    public ?string $code = null;
    public ?string $exception = null;
    public ?string $message = null;
    public ?string $logMessage = null;
    public ?string $timestamp = null;
    public ?string $file = null;
    public ?string $line = null;
    public ?string $trace = null;
}