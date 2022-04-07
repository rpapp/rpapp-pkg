<?php

namespace RPAPP;

use Carbon\Carbon;

use RPAPP\Messages;
use RPAPP\LogMessages;
use RPAPP\ResponseStatusCodes;

class JSONResponses
{
    public function getInvalidAPIOrResourceNotFound(): ?object
    {
        $responseObject = (object) [];
        $responseObject->code = ResponseStatusCodes::NOT_IMPLEMENTED;
        $responseObject->message = Messages::INVALID_API_OR_RESOURCE_NOT_FOUND;
        $responseObject->logMessage = LogMessages::INVALID_API_OR_RESOURCE_NOT_FOUND;
        $responseObject->timestamp = Carbon::now()->toDateTimeString();

        return response()->json($responseObject, ResponseStatusCodes::NOT_IMPLEMENTED);
    }

    public function getUserFound(object $object): ?object
    {
        $responseObject = (object) [];
        $responseObject = $object;
        $responseObject['code'] = ResponseStatusCodes::OK;
        $responseObject['message'] = Messages::USER_FOUND;
        $responseObject['logMessage'] = LogMessages::USER_FOUND;
        $responseObject['timestamp'] = Carbon::now()->toDateTimeString();

        return response()->json($responseObject, ResponseStatusCodes::OK);
    }

    public function getUserNotFound(): ?object
    {
        $responseObject = (object) [];                    
        $responseObject->code = ResponseStatusCodes::NOT_FOUND;
        $responseObject->message = Messages::USER_NOT_FOUND;
        $responseObject->logMessage = LogMessages::USER_NOT_FOUND;
        $responseObject->timestamp = Carbon::now()->toDateTimeString();

        return response()->json($responseObject, ResponseStatusCodes::NOT_FOUND);
    }

    public function getQueryException(string $code = null, string $message, string $file, string $line, string $trace): ?object
    {
        $responseObject = (object) [];                    
        $responseObject->code = ResponseStatusCodes::BAD_REQUEST;
        $responseObject->message = $message;
        $responseObject->logMessage = LogMessages::QUERY_EXCEPTION;
        $responseObject->timestamp = Carbon::now()->toDateTimeString();
        $responseObject->file = $file;
        $responseObject->line = $line;
        $responseObject->trace = $trace;

        return response()->json($responseObject, ResponseStatusCodes::BAD_REQUEST);
    }

    public function getException(string $code = null, string $message, string $file, string $line, string $trace): ?object
    {
        $responseObject = (object) [];                    
        $responseObject->code = ResponseStatusCodes::BAD_REQUEST;
        $responseObject->message = $message;
        $responseObject->logMessage = LogMessages::GENERAL_EXCEPTION;
        $responseObject->timestamp = Carbon::now()->toDateTimeString();
        $responseObject->file = $file;
        $responseObject->line = $line;
        $responseObject->trace = $trace;

        return response()->json($responseObject, ResponseStatusCodes::BAD_REQUEST);
    }

    public function getCreated(string $message, string $logMessage): ?object
    {
        $responseObject = (object) [];                    
        $responseObject->code = ResponseStatusCodes::OK;
        $responseObject->message = $message;
        $responseObject->logMessage = $logMessage;
        $responseObject->timestamp = Carbon::now()->toDateTimeString();       

        return response()->json($responseObject, ResponseStatusCodes::OK);
    }

    public function getUpdated(string $message, string $logMessag): ?object
    {
        $responseObject = (object) [];                    
        $responseObject->code = ResponseStatusCodes::OK;
        $responseObject->message = $message;
        $responseObject->logMessage = $logMessage;
        $responseObject->timestamp = Carbon::now()->toDateTimeString();       

        return response()->json($responseObject, ResponseStatusCodes::OK);
    }   

    /**
     * General or common response message.
     * @param string|null $responseStatusCodes 
     * @param string|null $message
     * @param string|null $logMessage
     */
    public function getMessage(string $responseStatusCodes = null, string $message = null, string $logMessage = null): ?object
    {
        $responseObject = (object) [];
        $responseObject->code = $responseStatusCodes;
        $responseObject->message = $message;
        $responseObject->logMessage = $logMessage;
        $responseObject->timeStamp = Carbon::now()->toDateTimeString();

        return response()->json($responseObject, $responseStatusCodes);
    }
}