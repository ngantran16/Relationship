<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::all();

        foreach($categories as $category){
            $category->photos;
        }
        // echo "<pre>".json_encode($categories,JSON_PRETTY_PRINT)."<pre>";
    }

    function showCategory($id){
        $category = Category::find($id);
        return view('admin.category.index',['category' => $category]);

    }

    function destroyCategory($id){
        Category::find($id)->delete();
        return redirect('/admin/photos');
    }



}
