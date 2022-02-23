<?php

namespace RPAPP;

use RPAPP\Messages;
use RPAPP\LogMessages;

class LDAPError
{
	public function __construct() {}
	public function getError(string $errorCode = NULL): array
	{
		$message = array();

		switch($errorCode) 
		{
			case('525'): 
			{
				$message = array('code' => '525', 'message' => Messages::USER_NOT_FOUND, 'log_message' => LogMessages::USER_NOT_FOUND);
				break;
			}
			case('52e'):
			{
				$message = array('code' => '52e', 'message' => Messages::INVALID_CREDENTIALS, 'log_message' => LogMessages::INVALID_CREDENTIALS);
				break;
			}
			case('530'):
			{
				$message = array('code' => '530', 'message' => Messages::USER_NOT_PERMITTED_AT_THIS_TIME, 'log_message' => LogMessages::USER_NOT_PERMITTED_AT_THIS_TIME);
				break;
			}
			case('531'):
			{
				$message = array('code' => '531', 'message' => Messages::USER_NOT_PERMITTED_AT_THIS_WORKSTATION, 'log_message' => LogMessages::USER_NOT_PERMITTED_TO_LOGIN_AT_THIS_WORKSTATION);
				break;
			}
			case('532'):
			{
				$message = array('code' => '532', 'message' => Messages::PASSWORD_EXPIRED, 'log_message' => LogMessages::PASSWORD_EXPIRED);
				break;
			}
			case('533'):
			{
				$message = array('code' => '533', 'message' => Messages::ACCOUNT_DISABLED, 'log_message' => LogMessages::ACCOUNT_DISABLED);
				break;
			}
			case('701'):
			{
				$message = array('code' => '701', 'message' => Messages::ACCOUNT_EXPIRED, 'log_message' => LogMessages::ACCOUNT_EXPIRED);
				break;
			}
			case('773'):
			{
				$message = array('code' => '773', 'message' => Messages::USER_MIST_RESET_PSSWORD, 'log_message' => LogMessages::USER_MUST_RESET_PASSWORD);
				break;
			}
			case('775'):
			{
				$message = array('code' => '775', 'message' => Messages::USER_ACCOUNT_LOCKED, 'log_message' => LogMessages::USER_ACCOUNT_LOCKED);
				break;
			}
			default:
			{
				$message = array('code' => '0', 'message' => Messages::UNKNOWN, 'log_message' => LogMessages::UNKNOWN);
				break;
			}
		}

		return $message;
	}
}