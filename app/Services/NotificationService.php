<?php

namespace App\Services;
use App\Models\Notification;


class NotificationService{

    public static function add_note($id,$old=null,$text)  {
        if($id != $old){
            $note = new Notification;
            $note->agent_id = $id;
            $note->text     = $text;
            $note->save();
        }
    }
    public static function my_notes()  {
        $notes = Notification::where(function($query){
                            if(auth()->user()){
                                $query->where('user_id',auth()->id());
                            }else{
                                $query->where('agent_id',auth()->guard('agent')->id());
                            }
                        })->get();
        return $notes;
    }
}