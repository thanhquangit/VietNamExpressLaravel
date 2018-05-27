<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advertisement;
class AdvertisementController extends Controller
{
    public function getListAdvertisement(){
    	$advertisement = Advertisement::all();
    	return view('admin.advertisement.list',compact('advertisement'));
    }
    public function getAddAdvertisement(){
    	return view('admin.advertisement.add');
    }
    public function postAddAdvertisement(Request $req){
    	$this->validate($req,
    		[
    			'url'=>'required',
    			'position'=>'required',
    			'content'=>'required'
    		],
    		[
    			'url.requied'=>'url is not Empty',
    			'position.requied'=>'position is not Empty',
    			'content.requied'=>'Content is not Empty'
    		]);
    	$advertisement = new Advertisement;
    	$advertisement->position = $req->position;
    	$advertisement->url = $req->url;
    	$advertisement->content = $req->content;
    	$advertisement->numberClick = 0;
    	if($req->hasFile('image')){
    	 	$file = $req->file('image');
    	 	$duoi = $file->getClientOriginalExtension();
    	 	if($duoi != 'jpeg' && $duoi != 'jpg' && $duoi != 'png'){
    	 		return redirect('admin/advertisement/add')->with('notify','File bạn chọn không phải hình ảnh');
    	 	}
    	 	$name=$file->getClientOriginalName();
    	 	$Hinh = str_random(4)."_".$name;
    	 	// Kiem tra file ton tai hay k
    	 	while(file_exists("upload/quangcao".$Hinh)){
    	 		$Hinh = str_random(4)."_".$name;
    	 	}
    	 	$file->move("upload/quangcao",$Hinh);
    	 	$advertisement->urlImage = $Hinh;
    	 }
    	 else{
    	 	$advertisement->urlImage= "";
    	 }
    	$advertisement->save();
    	return redirect('admin/advertisement/add')->with('notify','Add advertisement is successfully');
    }
    public function getDeleteAdvertisement($id){
    	$advertisement = Advertisement::find($id);
    	$advertisement->delete();
    	return redirect('admin/advertisement/list')->with('notify','Delete Advertisement is successfully');
    }
    public function getEditAdvertisement($id){
    	$advertisement = Advertisement::find($id);
    	return view('admin.advertisement.edit',compact('advertisement'));
    }
    public function postEditAdvertisement($id, Request $request){
    	 $this->validate($request,
    		[
    			'url'=>'required',
    			'position'=>'required',
    			'content'=>'required'
    		],
    		[
    			'url.requied'=>'url is not Empty',
    			'position.requied'=>'position is not Empty',
    			'content.requied'=>'Content is not Empty'
    		]);
    	$advertisement = Advertisement::find($id);
    	$advertisement->position = $request->position;
    	$advertisement->url = $request->url;
    	$advertisement->content = $request->content;
    	 if($request->hasFile('image')){
    	 	$file = $request->file('image');
    	 	$duoi = $file->getClientOriginalExtension();
    	 	if($duoi != 'jpeg' && $duoi != 'jpg' && $duoi != 'png'){
    	 		return redirect('admin/advertisement/edit/'.$id)->with('notify','File bạn chọn không phải hình ảnh');
    	 	}
    	 	$name=$file->getClientOriginalName();
    	 	$Hinh = str_random(4)."_".$name;
    	 	// Kiem tra file ton tai hay k
    	 	while(file_exists("upload/quangcao".$Hinh)){
    	 		$Hinh = str_random(4)."_".$name;
    	 	}
    	 	$file->move("upload/quangcao",$Hinh);
    	 	unlink("upload/quangcao/".$advertisement->urlImage);
    	 	$advertisement->urlImage = $Hinh;
    	 }
    	 $advertisement->save();
    	 return redirect('admin/advertisement/edit/'.$id)->with('notify','Edit advertisement is successfully');
    }
}
