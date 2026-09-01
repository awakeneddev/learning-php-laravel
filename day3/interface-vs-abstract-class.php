<?php

interface EmailProvider
{
	public function sendEmail(string $message, string $email): string;
	public function checkEmail(string $email): bool;
	public function isValidApiKey(): bool;
}

abstract class BaseEmailProvider implements EmailProvider
{

	protected string $emailProviderName;

	public function __construct(
		protected string $apiKey
	) {}

	public function log(string $message)
	{
		echo "[{$this->emailProviderName}]" . "------> " . $message;
	}


	abstract public function sendEmail(
		string $message,
		string $email
	): string;

	abstract public function checkEmail(
		string $email
	): bool;

	public function isValidApiKey(): bool
	{
		$validApiKeys = ["akash-tel-api-key", "udaan-tel-api-key"];
		if (in_array($this->apiKey, $validApiKeys, true)) {
			return true;
		} else {
			return false;
		}
	}
}

class AkashTel extends BaseEmailProvider
{

	protected string $emailProviderName = "AkashTel";

	public function checkEmail(string $email): bool
	{
		$validEmails = ["abc@gmail.com", "def@gmail.com"];
		return in_array($email, $validEmails, true);
	}

	public function sendEmail(string $message, string $email): string
	{
		if (!$this->isValidApiKey()) return "Invalid Api Key" . PHP_EOL;

		if ($this->checkEmail($email)) {
			$this->log("Sending message from {$this->emailProviderName} to {$email}" . PHP_EOL);
			$finalMessage = "[{$this->emailProviderName}]" . "------> " . $message . PHP_EOL;
			return $finalMessage;
		}

		return $this->emailProviderName . " does not have given email : " . $email . PHP_EOL;
	}
}

class UdaanTel extends BaseEmailProvider
{

	protected string $emailProviderName = "UdanTel";

	public function checkEmail(string $email): bool
	{
		$validEmails = ["zzz@gmail.com", "xxx@gmail.com"];
		return in_array($email, $validEmails, true);
	}

	public function sendEmail(string $message, string $email): string
	{

		if (!$this->isValidApiKey()) return "Invalid Api Key" . PHP_EOL;
		if ($this->checkEmail($email)) {

			$this->log("Sending message from {$this->emailProviderName} to {$email}" . PHP_EOL);
			$finalMessage = "[{$this->emailProviderName}]" . "------> " . $message . PHP_EOL;
			return $finalMessage;
		}

		return $this->emailProviderName . " does not have given email : " . $email . PHP_EOL;
	}
}


$akash = new AkashTel("akash-tel-api-key");
echo $akash->sendEmail("Hello this is GENg", "abc@gmail.com");

$udaan = new UdaanTel("udaan-tel-api-key");
echo $udaan->sendEmail("Hello this is Udan GENg", "zzz@gmail.com");
