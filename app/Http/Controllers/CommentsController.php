<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserComment;

class CommentsController extends Controller
{
    //

    public function index()
    {
        $level0 = \App\UserComment::where("level","=",0);
        $level0 = $level0->orderBy('created_at','desc')->get();

        $level1 = \App\UserComment::where("level","=",1);
        $level1 = $level1->orderBy('created_at','desc')->get();

        $level2 = \App\UserComment::where("level","=",2);
        $level2 = $level2->orderBy('created_at','desc')->get();

        // dd($level0);
        // dd($level0,$level1,$level2);
        return view("comment_section.index",['level0'=>$level0,
                                            'level1'=>$level1,
                                            'level2'=>$level2]);
    }

    public function store(Request $request)
    {
        $userComment = new \App\UserComment;
        $userComment->parent_id = $request->input('parent_id');
        $userComment->level = $request->input('level');
        $userComment->name = $request->input('name');
        $userComment->comment = $request->input('comment');
        $userComment->save();

        // if($userComment->save())
        // {
        //     return response()->json(['message'=>"Successfully added new comment",'status'=>true]);
        // }
        // else
        // {
        //     return response()->json(['message'=>"Failed to add new comment. Please try again",'status'=>false]);
        // }

        return view('comment_section.comment',['comment'=>$userComment]);
    }
}
