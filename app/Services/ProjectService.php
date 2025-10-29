<?php
namespace App\Services;
use App\Models\Project;


final class ProjectService
{
   public static function items()  {
       $allData = Project::OrderBy('id','desc')->get();
       $arr = [];
       foreach ($allData as $data) {
         $arr[$data->id] = $data->name;
       }
       return $arr;
   }
}
   