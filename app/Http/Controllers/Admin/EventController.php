<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
class EventController extends Controller
{
    public function getListEvent(){
    	$event = Event::all();
    	return view('admin.event.list',compact('event'));
    }
    public function getAddEvent(){
    	return view('admin.event.add');
    }
    public function postAddEvent(Request $req){
    	$this->validate($req,
    		[
    			'content'=>'required'
    		],
    		[
    			'content.requied'=>'Content is not Empty'
    		]);
    	$event = new Event;
    	$event->content = $req->content;
    	$event->save();
    	return redirect('admin/event/add')->with('notify','Add Event is successfully');
    }
    public function getEditEvent($id){
    	$event = Event::find($id);
    	return view('admin.event.edit',compact('event'));
    }
    public function postEditEvent(Request $req,$id){
    	$this->validate($req,
    		[
    			'content'=>'required'
    		],
    		[
    			'content.requied'=>'Content is not Empty'
    		]);
    	$event =  Event::find($id);
    	$event->content = $req->content;
    	$event->save();
    	return redirect('admin/event/edit/'.$id)->with('notify','Edit Event is successfully');
    }
}
