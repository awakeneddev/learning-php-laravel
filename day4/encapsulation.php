<?php

class UserDetails
{
	// Public --> accessible from, everywhere
	public string $name;
	// Protected --> accessible inside this class and child classes
	protected string $email;
	// Private --> accessible ONLY inside this class
	private string $password;

	public function __construct(string $name, string $email, string $password)
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	protected function getEmail(): string
	{
		return $this->email;
	}

	protected function setEmail(string $email): void
	{
		$this->email = $email;
	}

	private function getPassword(): string
	{
		return $this->password;
	}

	protected function setPassword(string $oldPassword, string $newPassword): bool
	{
		if (
			$this->getPassword() == $oldPassword

		) {
			$this->password = $newPassword;
			echo "Password updated " . PHP_EOL;
			return true;
		}
		echo "Wrong password " . PHP_EOL;
		return false;
	}
}

class AdminUser extends UserDetails
{

	public function __construct(string $name, string $email, string $password)
	{
		 parent::__construct($name, $email, $password);
	}

	public function updateEmail(string $email):void
	{
		$this->setEmail($email);
	}

	public function getParentEmail():string
	{
		return $this->getEmail();
	}

	public function updatePassword(string $oldPassword, string $newPassword): bool
	{
		return $this->setPassword($oldPassword, $newPassword);
	}
}

$adminUserDetail = new AdminUser("DevG", "devg@gmail.com", "hahahehe@123");
$adminUserDetail->setName("Awakened Dev");
echo $adminUserDetail->getName() . PHP_EOL;
$adminUserDetail->updateEmail("awakeneddev@gmail.com");
echo $adminUserDetail->getParentEmail() . PHP_EOL;
$adminUserDetail->updatePassword("hahahehe@123", "hohohehe");
