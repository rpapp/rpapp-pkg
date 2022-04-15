<?php

namespace RPAPP;

use Carbon\Carbon;

use RPAPP\Messages;
use RPAPP\LogMessages;
use RPAPP\ResponseStatusCodes;

class JSONResponses
{
    /**
     * Get invalid API or resouce not found message.
     * 
     * @return object|null
     */
    public function getInvalidAPIOrResourceNotFound(): ?object
    {
        // $responseObject = (object) [];
        // $responseObject->code = ResponseStatusCodes::NOT_IMPLEMENTED;
        // $responseObject->message = Messages::INVALID_API_OR_RESOURCE_NOT_FOUND;
        // $responseObject->logMessage = LogMessages::INVALID_API_OR_RESOURCE_NOT_FOUND;
        // $responseObject->timestamp = Carbon::now()->toDateTimeString();

        // return response()->json($responseObject, ResponseStatusCodes::NOT_IMPLEMENTED);

        return response()->json([
            'code' => ResponseStatusCodes::NOT_IMPLEMENTED,
            'message' => Messages::INVALID_API_OR_RESOURCE_NOT_FOUND,
            'logMessage' => LogMessages::INVALID_API_OR_RESOURCE_NOT_FOUND,
            'timestamp' => Carbon::now()->toDateTimeString()
        ]);
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
    /**
     * Get query exception message.
     * 
     * @param string|null $code
     * @param string|null $message
     * @param string|null $file
     * @param string|null $line
     * @param string|null $trace
     * 
     * @return object|null
     */
    public function getQueryException(string $code = null, string $message = null, string $file = null, string $line = null, string $trace = null): ?object
    {
        $responseObject = (object) [];                    
        
        if($code == 0 || $code == null || $code == '')
        {
            $responseObject->code = ResponseStatusCodes::BAD_REQUEST;
        }
        else
        {
            $responseObject->code = $code;
        }
        
        $responseObject->message = $message;
        $responseObject->logMessage = LogMessages::QUERY_EXCEPTION;
        $responseObject->timestamp = Carbon::now()->toDateTimeString();
        $responseObject->file = $file;
        $responseObject->line = $line;
        $responseObject->trace = $trace;

        return response()->json($responseObject, ResponseStatusCodes::BAD_REQUEST);
    }
    /**
     * Get exception message.
     * 
     * @param string|null $code
     * @param string|null $message
     * @param string|null $logMessage
     * @param string|null $file
     * @param string|null $line
     * @param string|null $trace
     * 
     * @return object|null
     */
    public function getException(string $code = null, string $codeMessage = null, string $message = null, string $logMessage = null, string $file = null, string $line = null, string $trace = null): ?object
    {
        // $responseObject = (object) [];

        // if($code == 0 || $code == null || $code == '')
        // {
        //     $responseObject->code = ResponseStatusCodes::INTERNAL_SERVER_ERROR;
        // }
        // else
        // {
        //     $responseObject->code = $code;
        // }

        // $responseObject->message = $message;
        // $responseObject->logMessage = $logMessage;
        // $responseObject->timestamp = Carbon::now()->toDateTimeString();
        // $responseObject->file = $file;
        // $responseObject->line = $line;
        // $responseObject->trace = $trace;

        // return response()->json($responseObject, ResponseStatusCodes::INTERNAL_SERVER_ERROR);
        return response()->json([
            'code' => $code,
            'codeMessage' => $codeMessage,
            'message' => $message,
            'logMessage' => $logMessage,
            'timestamps' => Carbon::now()->toDateTimeString(),
            'exceptionDetails' =>
            [
                'file' => $file,
                'line' => $line,
                'trace' => $trace
            ]
        ]);
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
     * Generic or common response message.
     * 
     * @param string|null $responseStatusCodes 
     * @param string|null $message
     * @param string|null $logMessage
     * 
     * @return object|null
     */
    public function getMessage(string $responseStatusCodes = null, string $message = null, string $logMessage = null): ?object
    {
        return response()->json([
            'code' => $responseStatusCodes,
            'message' => $message,
            'logMessage' => $logMessage,
            'timestamp' => Carbon::now()->toDateTimeString()
        ], $responseStatusCodes);
    }
    /**
     * Set generic or common response message.
     * 
     * @param string|null $responseStatusCode
     * @param string|null $message
     * @param string|null $logMessage
     * 
     * @return object|null
     */
    public function setMessage(int $responseStatusCode = null, string $message = null, string $logMessage = null): ?object
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
     * 
     * @return object|null
     */
    public function getInternalServerError(): ?object
    {
        $responseObject = (object) [];
        $responseObject->code = ResponseStatusCodes::INTERNAL_SERVER_ERROR;
        $responseObject->message = Messages::INTERNAL_SERVER_ERROR;
        $responseObject->logMessage = LogMessages::INTERNAL_SERVER_ERROR;
        $responseObject->timeStamp = Carbon::now()->toDateTimeString();

        return response()->json($responseObject, ResponseStatusCodes::INTERNAL_SERVER_ERROR);
    }
    /**
     * Get not found message.
     * 
     * @param string|null $message
     * @param string|null $logMessage
     * 
     * @return object|null
     */
    public function getNotFound(string $message = null, string $logMessage = null): ?object
    {
        $responseObject = (object) [];                    
        $responseObject->code = ResponseStatusCodes::NOT_FOUND;
        $responseObject->message = $message;
        $responseObject->logMessage = $logMessage;
        $responseObject->timestamp = Carbon::now()->toDateTimeString();

        return response()->json($responseObject, ResponseStatusCodes::NOT_FOUND);
    }
}