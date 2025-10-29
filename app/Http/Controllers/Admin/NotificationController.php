<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;


class NotificationController extends Controller
{
    public function note_view($id)  {
        $note = Notification::find($id);
        if ($note) {
            $note->status = 1;
            $note->save();
        }
    }
}
