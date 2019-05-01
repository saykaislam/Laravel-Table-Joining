<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function category()
    {
    	$sub=DB::table('subcategories')
    	        ->join('categories','subcategories.category_id','categories.id')
    	        ->select('subcategories.*','categories.name')
    	        ->get();
    	return view('subcategory', compact('sub'));
    }

    public function post()
    {
    	$post=DB::table('posts')
    	         ->join('categories','posts.cat_id','categories.id')
    	         ->join('subcategories','posts.sub_id','subcategories.id')
    	         ->select('posts.*','categories.name','subcategories.sub_name')
    	         ->get();

    	return view('post', compact('post'));
    }
}
