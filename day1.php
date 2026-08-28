<?php
/**
 * @var array{
 *     name: string,
 *     age: int,
 *     isActive: bool,
 *     isDeveloper: bool,
 *     skills: string[]
 * } $user
 */
$user = [
    "name" => "DevG",
    "age" => 25,
    "isActive" => true,
    "isDeveloper" => true,
    "skills" =>  ["JS", "Solidity", "Php", "AI"]
];

$name = "DevG";
$age =18;
$isActive = true;
$isDeveloper = true;
$skills = ["JS", "Solidity", "Php", "AI"];

function getUserDescription(string $name ,int $age,bool $isActive,bool $isDeveloper,  array $skills): string
{
    $tempValue = "";
    if($age >= 18 && $isDeveloper && $isActive ){
	$tempValue = "$name is a developer, where he is $age years old." . PHP_EOL ;
	$tempValue .= "Skills : " . PHP_EOL;
	foreach($skills as $skill){
	    $tempValue .=  $skill . PHP_EOL;
	}
	return $tempValue;
    }else{
	$tempValue =  "$name is just a normal guy";
	return $tempValue;
    }

}

function getUserDescriptionFromAssociative(array $user): string
{
    $tempValue = "";
    if($user["age"] >= 18 && $user["isDeveloper"] && $user["isActive"]){
	$tempValue  = $user["name"] . " is a developer, where he is " . $user["age"] . "years old." . PHP_EOL ;
	$tempValue .= "Skills" . PHP_EOL;
    foreach($user["skills"] as $skill){
	    $tempValue .= $skill . PHP_EOL;
	}
	return $tempValue;
    }
    return $tempValue = $user["name"] . "is a normal person";;
}

echo getUserDescription($name,$age,$isActive,$isDeveloper,$skills);

echo getUserDescriptionFromAssociative($user);

