<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plans;
use App\Vote;
class PlansController extends Controller
{
    public function getListPlans($id){
    	$plans= Plans::where('vote_id',$id)->get();
    	return view('admin.plans.list',compact('plans'));
    }
    public function getAddPlans($id){
    	$vote =  Vote::find($id);
    	return view('admin.plans.add',compact('vote'));
    }
    public function postAddPlans($id, Request $req){
    	$this->validate($req,
    		[
    			'content'=>'required'
    		],
    		[
    			'content.required'=>'Content is not Empty'
    		]);
    	$plans = new Plans;
    	$plans->content = $req->content;
    	$plans->numberClick = 0;
    	$plans->vote_id = $id;
    	$plans->save();
    	return redirect('admin/plans/add/'.$id)->with('notify','Add Plans is successfully');
    }
    public function getEditPlans($id){
    	$plans =  Plans::find($id);
    	return view('admin.plans.edit',compact('plans'));
    }
    public function postEditPlans($id, Request $req){
    	$this->validate($req,
    		[
    			'content'=>'required'
    		],
    		[
    			'content.required'=>'Content is not Empty'
    		]);
    	$plans = Plans::find($id);
    	$plans->content = $req->content;
    	$plans->save();
    	return redirect('admin/plans/edit/'.$id)->with('notify','Edit Plans is successfully');
    }
    public function getDeletePlans($id, $idV){
    	$plans = Plans::find($id);
    	$plans->delete();
    	return redirect('admin/plans/list/'.$idV)->with('notify','Delete Plans is successfully');
    }
}
