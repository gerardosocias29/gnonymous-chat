<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class ChatController extends Controller
{
    public function show(Request $request)
    {
        // Random Username
        $rand_username = ['Chris', 'John', 'Gregory', 'Steve', 'Bill', 'Bob', 'Elon', 'Tony', 'Tom', 'Tim', 'Kevin'];
        $select_username = $rand_username[array_rand($rand_username)];

        $n1 = rand(1,6); //Generate First number between 1 and 6  
        $n2 = rand(5,9); //Generate Second number between 5 and 9  
        $answer = $n1 + $n2;  
        
        $math = "What is ".$n1." + ".$n2." : ";  

        $request->session()->put('vercode', $answer);

        $captcha = "<p class='mt-2'>$math</p>";

        return view('welcome', ['username' => $select_username, 'captcha' => $captcha]);
    }

    public function create(Request $request) {
        //check captcha
        $status = false;
        if($request->captcha == session('vercode')){
            $message = ($request->username == null || $request->username == "") ? "Empty username!" : (($request->post_content == null || $request->post_content == "") ? "Empty Post" : "There was an error!");

            if(($request->username != null || $request->username != "") && ($request->post_content != null || $request->post_content != "")){
                $status = true;

                $post = new Posts;
                $post->username = $request->username;
                $post->post_content = $request->post_content;
                $post->post_visibility = "yes";
                if($post->save()){
                    $message = "Successfully Saved!";
                }
            }
        } else {
            $message = "Captcha Error!";
        }

        $ret = [
            "message" => $message,
            "status" => $status,
            "session" => $request->session()->get('vercode')
        ];
        return response($ret, 200);
    }
}
