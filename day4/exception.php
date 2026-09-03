<?php

trait HasTimestamp
{
	public function getCurrentTime(): string
	{
		return date("Y-m-d H-m-s");
	}
}

interface CampaignServiceI
{
	/**
	 * @param string[] $contacts
	 */
	public function createCampaign(string $name, array $contacts, string $createdAt): bool;
	public function cancelCampaign(int $campaignId, string $cancelledAt): bool;
	public function findCampaign(int $id): bool;
}

class NewCampaignService implements CampaignServiceI
{

	use HasTimeStamp;

	public static array $campaignIds = [];
	public static int $campaignCount = 0;


	public function createCampaign(string $name, array $contacts, string $createdAt): bool
	{
		if ($name === "") {
			throw new Exception("Campaign name cannot be empty");
		}
		if (count($contacts) === 0) {
			throw new Exception("To create campaign at one contact must be imported.");
		}
		self::$campaignCount++;
		self::$campaignIds[] = self::$campaignCount;
		echo "Campaign created at : " . $createdAt . PHP_EOL;
		return true;
	}

	public function findCampaign(int $id): bool
	{
		if (!in_array($id, self::$campaignIds, true)) {
			return throw new Exception("Requested campaign does not exists.");
		}
		return true;
	}

	public function cancelCampaign(int $campaignId, string $cancelledAt): bool
	{
		if (!$this->findCampaign($campaignId)) {

			return throw new Exception("Cannot cancel campaign which does not exist.");
		}

		echo "Campaign cancelled at : " . $cancelledAt . PHP_EOL;
		return true;
	}
}

$smsCampaign = new NewCampaignService();
$smsCampaign->createCampaign("SMS Campaign", ["98081193670"], $smsCampaign->getCurrentTime());

$notificationCampaign = new NewCampaignService();
$notificationCampaign->createCampaign("SMS Campaign", ["98081193670"], $notificationCampaign->getCurrentTime());



echo "The Campaigns are: " . implode(', ', NewCampaignService::$campaignIds) . PHP_EOL;
echo NewCampaignService::$campaignCount . PHP_EOL;

$smsCampaign->cancelCampaign(1, $smsCampaign->getCurrentTime());
$notificationCampaign->cancelCampaign(2, $notificationCampaign->getCurrentTime());
