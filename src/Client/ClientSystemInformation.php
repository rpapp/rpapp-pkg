<?php

namespace RPAPP\Client;

/**
 * Client system information.
 */
class ClientSystemInformation
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
    }

    /**
     * Get clients all available system information.
     * @return string
     *
     */
    public function getAll(): string
    {
        return php_uname('a');
    }

    /**
     * Get clients operating system information.
     * @return string
     */
    public function getOperatingSystem(): string
    {
        return php_uname('s').' '.php_uname('v');
    }

    /**
     * Get client's hostname.
     * @return string
     */
    public function getHostname(): string
    {
        return php_uname('n');
    }

    /**
     * Get client's all available IPV4 IP Address.
     * @return string
     */
    public function getAllIPAddress(): string
    {
        return implode(',', gethostbynamel(gethostname()));
    }

    /**
     * Get clients user agent.
     * @return string
     */
    public function getUserAgent(): string
    {
        return getenv('HTTP_USER_AGENT');
    }
}