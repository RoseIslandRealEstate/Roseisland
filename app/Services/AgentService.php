<?php

namespace App\Services;
use App\Models\Agent;


class AgentService{

    public static function items()  {
       $allData = Agent::OrderBy('id','desc')->get();
       $arr = [];
       foreach ($allData as $data) {
         $arr[$data->id] = $data->name;
       }
       return $arr;
   }
   
}