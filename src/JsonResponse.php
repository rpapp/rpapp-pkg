<?php

namespace RPAPP;

use Carbon\Carbon;

use RPAPP\Message;
use RPAPP\LogMessage;
use RPAPP\ResponseStatusCode;

class JsonResponse
{
    /**
     * Get invalid API or resouce not found message.
     * @return object|null
     **/
    public function getInvalidAPIOrResourceNotFound(): ?object
    {
        return response()->json([
            'code' => ResponseStatusCode::NOT_IMPLEMENTED,
            'message' => Message::INVALID_API_OR_RESOURCE_NOT_FOUND,
            'logMessage' => LogMessage::INVALID_API_OR_RESOURCE_NOT_FOUND,
            'timestamp' => Carbon::now()->toDateTimeString()
        ], ResponseStatusCode::NOT_IMPLEMENTED);
    }
    /**
     * Set message.
     * @param string|null $responseStatusCode
     * @param string|null $message
     * @param string|null $logMessage
     * @return object|null
     **/
    public function setMessage(int $responseStatusCode = 0, string $message = null, string $logMessage = null): ?object
    {
        return response()->json([
            'code' => $responseStatusCode,
            'message' => $message,
            'logMessage' => $logMessage,
            'timestamp' => Carbon::now()->toDateTimeString()
        ], $responseStatusCode);
    }
    /**
     * Get internal server error message.
     * @return object|null
     **/
    public function getInternalServerError(): ?object
    {
        return response()->json([
            'code' => ResponseStatusCode::INTERNAL_SERVER_ERROR,
            'message' => Message::INTERNAL_SERVER_ERROR,
            'logMessage' => LogMessage::INTERNAL_SERVER_ERROR,
            'timestamp' => Carbon::now()->toDateTimeString()
        ], ResponseStatusCode::INTERNAL_SERVER_ERROR);
    }
    /**
     * Set error exception message.
     * @param $responseStatusCode
     * @param string $message
     * @param string $logMessage
     * @param string $file
     * @param string $line
     * @param string $trace
     * @return object
     **/
    public function setErrorExceptionMessage($responseStatusCode, string $exception, string $message, string $logMessage, string $file, string $line, string $trace)
    {
        return response()->json([
            'code' => $responseStatusCode,
            'exception' => $exception,
            'message' => $message,
            'logMessage' => $logMessage,
            'timestamp' => Carbon::now()->toDateTimeString(),
            'exceptionDetails' => [
                'file' => $file,
                'line' => $line,
                'trace' => $trace
            ]
        ], ResponseStatusCode::OK);
    }
}