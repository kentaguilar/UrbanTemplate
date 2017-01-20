<?php

require_once("core/urbantemplate.class.php");

$userlist = array(
  array("username" => "Hector Mitchell", "location" => "3698 Maple Rd"),
  array("username" => "Naomi Jacobs", "location" => "5096 Second St"),
  array("username" => "Jimmy Stevens", "location" => "3048 E Santa Ana St"),
);

foreach($userlist as $user)
{
  $row = new UrbanTemplate("views/userlist_row");
  foreach($user as $key => $value)
  {
    $row->set($key, $value);
  }

  $usersTemplates[] = $row;
}

$usersContents = UrbanTemplate::merge($usersTemplates);

$usersList = new UrbanTemplate("views/userlist");
$usersList->set("users", $usersContents);

$layout = new UrbanTemplate("views/layouts/layout");
$layout->set("title", "User List");
$layout->set("content", $usersList->output());

echo $layout->output();
