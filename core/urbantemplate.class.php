<?php

class UrbanTemplate
{
  protected $_layout;
  protected $_variables = array();

  public function with($key, $value)
  {
    $this->_variable[$key] = $value;
    return $this;
  }

  public function append_to_layout($value)
  {      
      $this->_variable['content'] = $value;
  }

  public function view($layout)
  {
    $this->_layout = $layout . ".urban.php";

    if(!file_exists($this->_layout))
    {
      return "[Error loading template file (" . $this->_layout . ")]";
    }

    $output = file_get_contents($this->_layout);
    foreach($this->_variable as $key => $value)
    {
      $tagToReplace = "[@$key]";
      $output = str_replace($tagToReplace, $value, $output);
    }

    return $output;
  }

  public function merge($layout, $templates, $separator = "\n")
  {
    $output = "";
    foreach($templates as $template)
    {
      $content = (get_class($template) !== "UrbanTemplate")
                ? "[Error, incorrect type - expected template]" : $template->view($layout);
      $output .= $content . $separator;
    }

    return $output;
  }
}
