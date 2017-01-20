<?php

require_once("core/urbantemplate.class.php");

$profile = new UrbanTemplate("views/profile");
$profile->set("username", "pogi");
$profile->set("name", "Pogi points");
$profile->set("age", "26");
$profile->set("location", "Davao");

$layout = new UrbanTemplate("views/layouts/layout");
$layout->set("title", "My User Profile");
$layout->set("content", $profile->output());

echo $layout->output();
