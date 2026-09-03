<?php

trait HasTimeStamp
{
	public function getCurrentTime(): string
	{
		return date("Y-m-d H:i:s");
	}
}

trait Loggable
{
	public function log(string $message): void
	{
		echo "[LOG] " . $message . PHP_EOL;
	}

	public function logError(string $message): void
	{

		echo "[ERROR] " . $message . PHP_EOL;
	}
}

class CampaignCreation
{
	use HasTimeStamp, Loggable;
}

class NotificationCreation
{
	use HasTimeStamp;
}


$campaignCreation = new CampaignCreation();
$notificationCreation = new NotificationCreation();


echo $campaignCreation->getCurrentTime() . PHP_EOL;
$campaignCreation->logError("Internal Server Error");
echo $notificationCreation->getCurrentTime() . PHP_EOL;
$campaignCreation->log("Error Resolved.");
