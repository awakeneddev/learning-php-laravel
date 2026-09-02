<?php

class CreateCampaign
{
	public string $campaignName;
	private static int $createdCampaignCount = 0;

	public function __construct(string $campaignName)
	{
		$this->campaignName = $campaignName;
		self::$createdCampaignCount++;
	}

	public static function getCampaignCount(): int
	{
		return self::$createdCampaignCount;
	}

	public static function resetCount(): void
	{
		self::$createdCampaignCount = 0;
	}
}


$campaign1 = new CreateCampaign("Campaign One");
echo CreateCampaign::getCampaignCount() . PHP_EOL;

$campaign2 = new CreateCampaign("Campaign 2");
echo CreateCampaign::getCampaignCount() . PHP_EOL;

$campaign3 = new CreateCampaign("Campaign 3");
echo CreateCampaign::getCampaignCount() . PHP_EOL;

CreateCampaign::resetCount();

echo CreateCampaign::getCampaignCount();
