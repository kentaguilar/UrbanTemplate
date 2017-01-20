<?php

require_once("core/urbantemplate.class.php");

$urban_template = new UrbanTemplate();

$urban_template->with("username", "pogi")->with("name", "Pogi points")
  ->with("age", "26")->with("location", "Davao")->with("title", "User Profile");
$urban_template->append_to_layout($urban_template->view("views/profile"));

echo $urban_template->with("title", "User Profile")->view("views/layouts/layout");
