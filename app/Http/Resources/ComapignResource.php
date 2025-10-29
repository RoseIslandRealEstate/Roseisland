<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComapignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $platforms = \App\Services\General::platforms();
        return [
                   'id'         =>  $this->id, 
                   'name'       =>  $this->name, 
                   'platform_name'   =>  isset($platforms[$this->platform])?$platforms[$this->platform]:'', 
                   'project'    =>  $this->project?$this->project->name:' ', 
                   'budget'     =>  $this->budget, 
                   'start_date' =>  $this->start_date, 
                   'end_date'   =>  $this->end_date, 
                   'leads_nos'  =>  0   
                ];
    }
}
