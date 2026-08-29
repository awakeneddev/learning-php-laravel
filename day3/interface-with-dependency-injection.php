<?php

interface SmsProvider
{
    public function sendMessage(string $message, string $phone):bool;
}

class CampaignService {

    public function __construct(
	private SmsProvider $provider
    ){}

    public function sendCampaignMessage(string $message, string $phone):void
    {
	$this->provider->sendMessage($message,$phone);
    }
}

class TouchSmsProvider implements SmsProvider{
    public function sendMessage(string $message, string $phone): bool
    {
	echo "Sending message from Touch SMS provider to " . $phone ." with message : " . PHP_EOL. $message ;
	return true;
    }
}

class SmsGlobalProvider implements SmsProvider{
    public function sendMessage(string $message, string $phone): bool
    {
	echo "Sending message from SmsGlobal provider to " . $phone ." with message : " . PHP_EOL. $message ;
	return true;
    }
}

class ClickSendProvider implements SmsProvider{
    public function sendMessage(string $message, string $phone): bool
    {
	echo "Sending message from Click Send provider to " . $phone ." with message : " . PHP_EOL. $message ;
	return true;
    }
}

function getSmsProvider(string $providerName):SmsProvider {
    return match($providerName) {
	"touch-sms" => new TouchSmsProvider(),
	"sms-global" => new SmsGlobalProvider(),
	"click-send" => new ClickSendProvider(),
	default => throw new Exception("Unknown SMS Provider"),
    };
}
// Now we switch different provider with just getSmsProvider
$provider = getSmsProvider("click-send");
$service = new CampaignService($provider);
$service->sendCampaignMessage("Hello from User 1","98XXXXXXXX");
