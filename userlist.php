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

//form grid content
$user_content = $urban_template->addDataToGridLayout("views/userlist_row", $user_templates);

//add grid content to main view
$urban_template->with("users", $user_content)->append_to_layout($urban_template->view("views/userlist"));

//add main view to layout
echo $urban_template->with("title", "User List")->view("views/layouts/layout");
