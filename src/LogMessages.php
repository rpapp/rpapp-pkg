<?php

namespace RPAPP;

class LogMessages
{
	//
	// For authentication;
	//
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

	public function __construct() {}

	public function getCode(Messages $message): int
	{
		$code = '';

		switch($message) {
			Messages::USER_NOT_FOUND {
				$code = '525';				
			}
			Messages::INVALID_CREDENTIALS {
				$code = '52e';
			}
			Messages::USER_NOT_PERMITTED_AT_THIS_TIME {
				$code = '530';
			}
			Messages::USER_NOT_PERMITTED_TO_LOGIN_AT_THIS_WORKSTATION {
				$code = '531';
			}
			Messages::ACCOUNT_EXPIRED {
				$code = '532';
			}
			Messages::ACCOUNT_DISABLED {
				$code = '533';
			}
			Messages::USER_MUST_RESET_PASSWORD {
				$code = '773';
			}
			Messages::USER_ACCOUNT_LOCKED {
				$code = '775';
			}
			default {
				$code = '0';
			}
		}

		return $code;
	}
}