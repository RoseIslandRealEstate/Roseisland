<?php 

namespace App\Services;

class LeadService{
    public static function types()  {
        return [
            0 => 'Sales',
            1 => 'Rent'
        ];
    }
    public  static function statuses()  {
        return [
            0 => 'Fresh lead',
            1 => 'Not answering',
            2 => 'Deal Done',
        ];
    }
    public static function portals()  {
        return [
            'Bayut' => 'Bayut',
            'Dubizzle' => 'Dubizzle',
            'Property finder' => 'Property finder',
            'Landline call' => 'Landline call',
        ];
    }
}