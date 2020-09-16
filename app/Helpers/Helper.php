<?php
namespace App\Helpers;
  use Illuminate\Support\Str;

  Class Helper{
      static function stringModify($string){
          $str = preg_replace_array('/_/', [' '],$string);
          return Str::ucfirst($str);
      }

      static function whitespaceReplace($string){
          $str = str_replace(' ','_',$string);
          return strtolower($str);
      }

  }
