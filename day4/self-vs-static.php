<?php

// Self 
class Campaign
{
	public static string $channel = "Generic";

	public static function getType(): string
	{
		return self::$channel;
	}
}

// Static
class Notification
{
	public static string $type = "Dynamic";

	public static function getType(): string
	{
		return static::$type;
	}
}

class SmsCampaign extends Campaign
{
	public static string $channel = "SMS";
}

class EmailCampaign extends Campaign
{
	public static string $channel = "Email";
}

echo Campaign::getType() . PHP_EOL;
echo SmsCampaign::getType() . PHP_EOL;
echo EmailCampaign::getType() . PHP_EOL;

// static
class SmsNotification extends Notification
{
	public static string $type = "SMS";
}

class EmailNotification extends Notification
{
	public static string $type = "Email";
}

echo Notification::getType() . PHP_EOL;
echo SmsNotification::getType() . PHP_EOL;
echo EmailNotification::getType() . PHP_EOL;
