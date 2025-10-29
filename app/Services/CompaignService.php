<?php
namespace App\Services;
use App\Models\Compaign;


final class CompaignService
{
   public static function items()  {
       $allData = Compaign::OrderBy('id','desc')->get();
       $arr = [];
       foreach ($allData as $data) {
         $arr[$data->id] = $data->name;
       }
       return $arr;
   }
}
   