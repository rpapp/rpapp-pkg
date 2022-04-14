<?php

namespace RPAPP;

class LogMessages
{
	const SUCCESSFULLY_LOGIN = 'SUCCESSFULLY_LOGIN';
	const USER_NOT_FOUND = 'USER_NOT_FOUND';
	const INVALID_CREDENTIALS = 'INVALID_CREDENTIALS';
	const USER_NOT_PERMITTED_AT_THIS_TIME = 'USER_NOT_PERMITTED_AT_THIS_TIME';
	const USER_NOT_PERMITTED_TO_LOGIN_AT_THIS_WORKSTATION = 'USER_NOT_PERMITTED_TO_LOGIN_AT_THIS_WORKSTATION';
	const PASSWORD_EXPIRED = 'PASSWORD_EXPIRED';
	const ACCOUNT_DISABLED = 'ACCOUNT_DISABLED';
	const ACCOUNT_EXPIRED = 'ACCOUNT_EXPIRED';
	const USER_MUST_RESET_PASSWORD = 'USER_MUST_RESET_PASSWORD';
	const USER_ACCOUNT_LOCKED = 'USER_ACCOUNT_LOCKED';
	const UNKNOWN = 'UNKNOWN';
	const FAILED_LOGIN = 'USERNAME_AND_OR_PASSWORD_INCORRECT';
    const UNKNOWN_USER = 'UNKNOWN_USER';
    const CALL_SERVICE_DESK = 'CALL_SERVICE_DESK';
	const SYSTEM_GENERATED = 'SYSTEM_GENERATED';
	const INVALID_API_OR_RESOURCE_NOT_FOUND = 'INVALID_API_OR_RESOURCE_NOT_FOUND';
	const INVALID_API = 'INVALID_API';
	const RESOURCE_NOT_FOUND = 'RESOURCE_NOT_FOUND';	
	const USER_FOUND = 'USER_FOUND';
	const QUERY_EXCEPTION_ERROR = 'QUERY_EXCEPTION';
	const GENERAL_EXCEPTION = 'GENERAL_EXCEPTION';
	const USER_CREATED = 'USER_CREATED';
	const SYSTEM_ERROR = 'SYSTEM_ERROR';
	const INTERNAL_SERVER_ERROR = 'INTERNAL_SERVER_ERROR';
	const CREATED = 'CREATED';
	const UPDATED = 'UPDATED';
	const DELETED = 'DELETED';
	const EMPLOYEE_CODE_UPDATED = 'EMPLOYEE_CODE_UPDATED';	
	const NO_RECORD_FOUND = 'NO_RECORD_FOUND';
	const SUCCESS = 'SUCCESS';
	const FAILED = 'FAILED';

	public function __construct() {}
}