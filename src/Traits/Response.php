<?php

namespace RPAPP\Traits;

use Carbon\Carbon;

use RPAPP\DiagnosticLogs;
use RPAPP\Client\ClientSystemInformation;

trait Response
{
    /**
     * Variables
     */
    // Error Details.
    protected ?string $code = null;
    protected ?string $exception = null;
    protected ?string $message = null;
    protected ?string $logMessage = null;
    protected ?string $timestamp = null;
    protected ?string $file = null;
    protected ?string $line = null;
    protected ?string $trace = null;
    // General or Common Error Handler.
    public ?bool $hasError = null;
    public ?bool $isDisabled = null; // Use for components or elements `disabled` attribute.
    public ?bool $errorOnRender = null; // Use in livewire's render function.
    public ?bool $doNotRender = null; // TODO: Make this as `protected`.
    // File Handler.
    public ?string $diagnosticLogFile = null;
    // Loader Handler.
    public ?string $loaderMessage = null;
    // Test Var
    public $testVar;
    /**
     * Set error.
     * @param string|null $projectCode
     * @param string|null $userFullname
     * @param string|null $username
     * @param string|null $userSystemRole
     * @param string|null $userPosition
     * @param string|null $userDeparment
     * @param string|null $code
     * @param string|null $exception
     * @param string|null $message
     * @param string|null $logMessage
     * @param string|null $file
     * @param string|null $line
     * @param string|null $trace
     */
    public function setError(string $projectCode = null, 
        string $userFullname = null, string $username = null, string $userSystemRole = null, string $userPosition = null, string $userDepartment = null,
        string $code = null, string $exception = null, string $message = null, string $logMessage = null, string $file = null, string $line = null, string $trace = null)
    {
        $this->hasError = true;
        $this->isDisabled = true;
        $this->errorOnRender = true;

        $this->code = $code;
        $this->exception = $exception;
        $this->message = $message;
        $this->logMessage = $logMessage;
        $this->timestamp = Carbon::now()->toDateTimeString();
        $this->file = $file;
        $this->line = $line;
        $this->trace = $trace;
          
        $clientSystemInformation = new ClientSystemInformation();

        $diagnosticLog = new DiagnosticLogs();
        $this->diagnosticLogFile = $diagnosticLog->generate($projectCode, $userFullname, $username, $userSystemRole, $userPosition, $userDepartment, 
            $clientSystemInformation->getHostname(), $clientSystemInformation->getAllIPAddress(), $clientSystemInformation->getOperatingSystem(),
            $code, $exception, $message, $logMessage, $file, $line, $trace);
    }
    /**
     * Set loader message.
     * @return string|null
     */
    public function setLoaderMessage(string $loaderMessage): ?string
    {
        return $this->loaderMessage = $loaderMessage;
    }
    /**
     * Get diagnostic log file.
     * @return string|null
     */
    public function getDiagnosticLogFile(): ?string
    {
        return $this->diagnosticLogFile;
    }
    /**
     * Get error code.
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Get log message.
     * @return string|null
     */
    public function getLogMessage(): ?string
    {
        return $this->logMessage;
    }
    public function setDoNotRenderState(bool $doNotRender = null): ?bool
    {
        return $this->doNotRender = $doNotRender;
    }
    public function getDoNotRenderState(): ?bool
    {
        return $this->doNotRender;
    }
    public function renderState()
    {
        if($this->getDoNotRenderState())
        {
            return '';
        }
    }
}