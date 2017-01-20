<?php

require_once("core/urbantemplate.class.php");

$userlist = array(
  array("username" => "Hector Mitchell", "location" => "3698 Maple Rd"),
  array("username" => "Naomi Jacobs", "location" => "5096 Second St"),
  array("username" => "Jimmy Stevens", "location" => "3048 E Santa Ana St"),
);

$urban_template = new UrbanTemplate();

foreach($userlist as $user)
{
  $row_template = new UrbanTemplate();
  foreach($user as $key => $value)
  {
    $row_template->with($key, $value);
  }

  $user_templates[] = $row_template;
}

$user_content = $urban_template->merge("views/userlist_row", $user_templates);
$urban_template->with("users", $user_content)->append($urban_template->view("views/userlist"));

echo $urban_template->with("title", "User List")->view("views/layouts/layout");
