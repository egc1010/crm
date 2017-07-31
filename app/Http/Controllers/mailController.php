<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    public function enviarmail()
    {

    	mail::send(['text'=>'mail'],['name','lo que sea'],function($message){

    		$message->to('egc1010@gmail.com','To emmanuel')->subject('test');
    		$message->from('egc1010@gmail.com','To emmanuel');

    	});


    }
}
