<?php

namespace RPAPP;

class Messages 
{
	const SUCCESSFULLY_LOGIN = 'You have successfully login';
	const USER_NOT_FOUND = 'User not found';
	const INVALID_CREDENTIALS = 'Invalid credentials';
	const USER_NOT_PERMITTED_AT_THIS_TIME = 'User not permitted at this time';
	const USER_NOT_PERMITTED_TO_LOGIN_AT_THIS_WORKSTATION = 'User not permitted to login at this workstation';
	const PASSWORD_EXPIRED = 'Password expired';
	const ACCOUNT_DISABLED = 'Account disabled';
	const ACCOUNT_EXPIRED = 'Account expired';
	const USER_MUST_RESET_PASSWORD = 'User must reset password';
	const USER_ACCOUNT_LOCKED = 'User account locked';
	const UNKNOWN = 'Unknown';
	const FAILED_LOGIN = 'Username and or password is incorrect';
	const PASSWORD_FAILED = 'The provided password is incorrect';
    const CALL_SERVICE_DESK = 'Please call Service Desk Team';	
	const SYSTEM_GENERATED = 'System generated';
	const INVALID_API_OR_RESOURCE_NOT_FOUND = 'Invalid API or resource not found';
	const INVALID_API = 'Invalid API';
	const RESOURCE_NOT_FOUND = 'Resource not found';
	const USER_FOUND = 'User found';
	const USER_CREATED = 'User created';
	const SYSTEM_ERROR = 'System error';

	const CREATED = 'Created';
	const UPDATED = 'Updated';	
	const DELETED = 'Deleted';
	const EMPLOYEE_CODE_UPDATED = 'Employee code updated';
	const NO_RECORD_FOUND = 'No record found';
	const SUCCESS = 'Success';
	const FAILED = 'Failed';

	const ERROR = 'Error';
	
	// Exception
	const QUERY_EXCEPTION = 'Query exception';
	const GENERAL_EXCEPTION = 'General exception';

	// Response Status
	const INTERNAL_SERVER_ERROR = 'Internal server error';
	const BAD_REQUEST = 'Bad request';

	/**
	 * Constructor
	 */
	public function __construct() {}
}