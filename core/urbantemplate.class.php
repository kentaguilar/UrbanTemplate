<?php

class UrbanTemplate
{
  protected $file;
  protected $values = array();

  public function __construct($file)
  {
    $this->file = $file . ".urban.php";
  }

  public function set($key, $value)
  {
    $this->values[$key] = $value;
  }

  public function output()
  {
    if(!file_exists($this->file))
    {
      return "[Error loading template file (" . $this->file . ")]";
    }

    $output = file_get_contents($this->file);
    foreach($this->values as $key => $value)
    {
      $tagToReplace = "[@$key]";
      $output = str_replace($tagToReplace, $value, $output);
    }

    return $output;
  }

  public static function merge($templates, $separator = "\r\n")
  {
    $output = "";
    foreach($templates as $template)
    {
      $content = (get_class($template) !== "UrbanTemplate")
                ? "[Error, incorrect type - expected template]" : $template->output();
      $output .= $content . $separator;
    }

    return $output;
  }
}
