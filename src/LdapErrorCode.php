<?php

namespace RPAPP;

use RPAPP\Messages;

class LDAPErrorCode
{
	public function __construct() {}
	public function getError(string $errorCode): array
	{
		$message = [];

		switch($errorCode) 
		{
			case('525'): 
			{
				$message = [('code' => '525', 'message' => Messages::USER_NOT_FOUND)];
				break;
			}
			case('52e'):
			{
				$message = [('code' => '52e', 'message' => Messages::INVALID_CREDENTIALS)];
				break;
			}
			case('530'):
			{
				$message = [('code' => '530', 'message' => Messages::USER_NOT_PERMITTED_AT_THIS_TIME)];
				break;
			}
			case('531'):
			{
				$message = [('code' => '531', 'message' => Messages::USER_NOT_PERMITTED_AT_THIS_WORKSTATION)];
				break;
			}
			case('532'):
			{
				$message = [('code' => '532', 'message' => Messages::PASSWORD_EXPIRED)];
				break;
			}
			case('533'):
			{
				$message = [('code' => '533', 'message' => Messages::ACCOUNT_DISABLED)];
				break;
			}
			case('701'):
			{
				$message = [('code' => '701', 'message' => Messages::ACCOUNT_EXPIRED)];
				break;
			}
			case('773'):
			{
				$message = [('code' => '773', 'message' => Messages::USER_MIST_RESET_PSSWORD)];
				break;
			}
			case('775'):
			{
				$message = [('code' => '775', 'message' => Messages::USER_ACCOUNT_LOCKED)];
				break;
			}
			default:
			{
				$message = [('code' => '0', 'message' => Messages::Unknown)];
				break;
			}
		}
	}
}