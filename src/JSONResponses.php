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
        $responseObject->logMessage = LogMessages::INVALID_API_OR_RESOURCES_NOT_FOUND;
        $responseObject->timestamp = Carbon::now()->toDateTimeString();

        return response()->json($responseObject, ResponseStatusCodes::NOT_IMPLEMENTED);
    }

    public function getUserFound(): ?object
    {
        $responseObject = (object) [];
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
}