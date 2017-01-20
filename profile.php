<?php

require_once("core/template.class.php");

$profile = new Template("views/profile.tpl");
$profile->set("username", "pogi");
$profile->set("name", "Pogi points");
$profile->set("age", "26");
$profile->set("location", "Davao");

$layout = new Template("views/layouts/layout.tpl");
$layout->set("title", "User Profile");
$layout->set("content", $profile->output());

echo $layout->output();
