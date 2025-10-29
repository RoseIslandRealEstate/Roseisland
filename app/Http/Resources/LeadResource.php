<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
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
        $projects  = \App\Services\ProjectService::items();
        $agents    = \App\Services\AgentService::items();
        $types     = \App\Services\LeadService::types();
        $compaigns = \App\Services\CompaignService::items();
        $statuses  = \App\Services\LeadService::statuses();
        $portals   = \App\Services\LeadService::portals();
        return [
                   'id'         =>  $this->id, 
                   'sno'        =>  $this->sno, 
                   'name'       =>  $this->name, 
                   'phone'      =>  $this->phone, 
                   'platform'   =>  isset($platforms[$this->platform])?$platforms[$this->platform]:'', 
                   'portal'     =>  isset($portals[$this->portal])?$portals[$this->portal]:'', 
                   'type'       =>  isset($types[$this->type])?$types[$this->type]:'', 
                   'Date'       =>  $this->date,
                   'project'    =>  $this->project_name,
                   'Status'     =>  isset($statuses[$this->status])?$statuses[$this->status]:'',
                   'Aign to'    =>  $this->agent_name,
                   
                ];
    }
}
