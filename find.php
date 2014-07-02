<?php
// 拡張子のカウント
class SystemCommand{
  public function find_extensions(){
    //$output = `find . -type f -print | sed -e 's/^.*\///' | grep '\.' | sed -e 's/^.*\.//' | sort | uniq -c | sort -nr`;
    $output = `find . -type f -print | sed -e 's/^.*\///' | grep '\.' | sed -e 's/^.*\.//' | sort | uniq`;
    return $output;
  }
}

