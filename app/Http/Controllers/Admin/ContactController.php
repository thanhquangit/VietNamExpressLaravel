<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
class ContactController extends Controller
{
    public function getListContact(){
    	$contact = Contact::all();
    	return view('admin.contact.list',compact('contact'));
    }
    public function getAddContact(){
    	return view('admin.contact.add');
    }
    public function postAddContact(Request $req){
    	$this->validate($req,
    		[
    			'name'=>'required',
    			'email'=>'required',
    			'content'=>'required'
    		],
    		[
    			'name.requied'=>'Name is not Empty',
    			'email.requied'=>'Email is not Empty',
    			'content.requied'=>'Content is not Empty'
    		]);
    	$contact = new Contact;
    	$contact->name = $req->name;
    	$contact->email = $req->email;
    	$contact->content = $req->content;
    	$contact->save();
    	return redirect('admin/contact/add')->with('notify','Add Contact is successfully');
    }
    
    public function getEditContact($id){
    	$contact  = Contact::find($id);
    	return view('admin.contact.edit',compact('contact'));	
    }
    public function postEditContact(Request $req, $id){
    	$this->validate($req,
    		[
    			'name'=>'required',
    			'email'=>'required',
    			'content'=>'required'
    		],
    		[
    			'name.requied'=>'Name is not Empty',
    			'email.requied'=>'Email is not Empty',
    			'content.requied'=>'Content is not Empty'
    		]);
    	$contact =Contact::find($id);
    	$contact->name = $req->name;
    	$contact->email = $req->email;
    	$contact->content = $req->content;
    	$contact->save();
    	return redirect('admin/contact/edit/'.$id)->with('notify','Edit Contact is successfully');
    }
}
