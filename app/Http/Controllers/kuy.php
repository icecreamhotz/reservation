<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\verifyEmail;
use Illuminate\Support\Facades\Mail;
use App\User;

class kuy extends Controller
{
    /*public function send(){
       /* Mail::send(['text' => 'mail'],['name' => 'kuy'],function($message){
            $message->to('best_dota@hotmail.com','Tokuy')->subject('test');
            $message->from('best_dota@hotmail.com','kuuu'); 
        });*/
        $thisUser = User::findOrFail(21);
        Mail::to('best_dota@hotmail.com')->send(new verifyEmail('kuy'));
}*
}
