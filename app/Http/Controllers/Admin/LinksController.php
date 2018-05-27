<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Links;
class LinksController extends Controller
{
    public function getAddLinks(){
    	return view('admin.links.add');
    }
    public function postAddLinks(Request $req){
    	$this->validate($req,
    		[
    			'url'=>'required',
    			'name'=>'required',
    			'stt'=>'required'
    		],
    		[
    			'url.requied'=>'url is not Empty',
    			'name.requied'=>'name is not Empty',
    			'stt.requied'=>'stt is not Empty'
    		]);
    	$links = new Links;
    	$links->url = $req->url;
    	$links->name = $req->name;
    	$links->stt = $req->stt;
    	$links->save();
    	return redirect('admin/links/add')->with('notify','Add Links is successfully');
    }
    public function getEditLinks($id){
    	$links = Links::find($id);
    	return view('admin.links.edit',compact('links'));
    }
    public function postEditLinks(Request $req, $id){
    	$this->validate($req,
    		[
    			'url'=>'required',
    			'name'=>'required',
    			'stt'=>'required'
    		],
    		[
    			'url.requied'=>'url is not Empty',
    			'name.requied'=>'name is not Empty',
    			'stt.requied'=>'stt is not Empty'
    		]);
    	$links = Links::find($id);
    	$links->url = $req->url;
    	$links->name = $req->name;
    	$links->stt = $req->stt;
    	$links->save();
    	return redirect('admin/links/edit/'.$id)->with('notify','Edit Links is successfully');
    }
    public function getListLinks(){
    	$links = Links::all();
    	return view('admin.links.list',compact('links'));
    }
    public function getDeleteLinks($id){
    	$links = Links::find($id);
    	$links->delete();
    	return redirect('admin/links/list')->with('notify','Delete Links is successfully');
    }
}
