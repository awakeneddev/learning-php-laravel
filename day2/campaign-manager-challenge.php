<?php

enum Status
{
    case draft;
    case scheduled;
    case running;
    case completed;
    case cancelled;
}

class Campaign
{
    public function __construct(
	private string $name,
	private Status $status,
	private int $totalContacts,
	private ?int $sentCount = 0
    ){}

    public function start():string 
    {
	if($this->status === Status::draft || $this->status === Status::scheduled){
	    $this->status = Status::running;
	    return $this->name . " campaign started. Current status " . $this->status->name . PHP_EOL ;
	}

	return "Campaign with " . $this->status->name . " status can't be started." . PHP_EOL;
    }

    public function getSummary(): string
    {
	return "Campaign " . $this->name . " current status is : " . $this->status->name . PHP_EOL .
	    "Total Contacts : " . $this->totalContacts . PHP_EOL .
	"Sent count : " . $this->sentCount;
    }

    public function sendMessage(int $count):string
    {
	if($this->status === Status::running){
	    if($count < 0){
		return "sent count cannot be nagative" . PHP_EOL;
	    }

	    if($this->totalContacts >= $count){
		$this->sentCount = $count;
		$remainingCount = $this->totalContacts - $this->sentCount;
	    return "Message has beed sent to " . $this->sentCount . " contact list for " . $this->name . " campaign." . "Now remaining are " . $remainingCount . PHP_EOL ;
	    }else{
		return "sent count cannot be greater than total contacts" . PHP_EOL;
	    }
	}
	return "Only running campaign is allowed to send message" . PHP_EOL;
    }

    public function complete():string
    {
	if($this->status === Status::running){
	    if($this->sentCount === $this->totalContacts){
		$this->status = Status::completed;
		return $this->name . " campaign is now " . $this->status->name . PHP_EOL;
	    }elseif($this->totalContacts > $this->sentCount){
		return "To mark as completed sent count must be equal to total contacts." . PHP_EOL;
	    }else{
		return "Sent count can't ne greater than total contacts" . PHP_EOL;
	    }
	}
	return "Only running campaign can be completed." . PHP_EOL;
    }

    public function cancel():string
    {
	$isCancelAvailable = $this->status === Status::draft || $this->status === Status::scheduled || $this->status === Status::running;
	echo $isCancelAvailable . PHP_EOL;
	if($isCancelAvailable){
	    $this->status = Status::cancelled;
	    return $this->name . " campaign is now " . $this->status->name . PHP_EOL;
	}
	return "Only campaigns in draft, scheduled, or running status can be cancelled.";
    }

    public function getPrgress():float
    {
	if($this->totalContacts === 0){
	    return 0;
	}
	$sent = $this->sentCount ?? 0;
	return ($sent / $this->totalContacts) * 100;
    }

}

$campaign = new Campaign("Black Friday Sale",Status::running,11,2);

/* echo $campaign->start(); */
/* echo $campaign->getSummary(); */
/* echo $campaign->sendMessage(101); */
/* echo $campaign->complete(); */
/* echo $campaign->cancel(); */
echo $campaign->getPrgress();
