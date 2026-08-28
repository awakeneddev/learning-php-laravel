
<?php

class User
{
    public function __construct(
	public string $name,
	public int $age,
	public bool $isDeveloper
    ){}

    public function getDescription(): string
    {
	if($this->isDeveloper){
	    return $this->name . " is a PHP Laravel developer. And he is " . $this->age . " years old";
	}

	return $this->name . " is not a developer.";
    }

}


$user = new User("DevG", 25, true);
echo $user->getDescription();
