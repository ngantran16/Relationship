<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Photo;
use App\Tag;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Photo_description;
use App\Taggable;

class PhotoController extends Controller
{
    function index(){
        $photos = Photo::all();

        foreach($photos as $photo){
            $photo->category;
            $photo->tags;
        }
        // echo "<pre>".json_encode($photos,JSON_PRETTY_PRINT)."<pre>";
        return view('admin.photo.index',['photos' => $photos]);
    }

    function destroyPhoto($id){
        DB::table('photo_descriptions')->where ('photo_id',$id)->delete();
        DB::table('taggables')->where ('photo_id',$id)->delete();
        Photo::find($id)->delete();

        return redirect('/admin/photos');
    }

    function showTags($id){
        $photos = Photo::all();
        foreach($photos as $photo){
            if ($photo->id == $id){
                $photo->tags;
                $tags = $photo;
            }
        }
        return view('admin.tag.index',['tags' => $tags]);
    }

    function create(){
        $categories = Category::all();
        $tags = Tag::all();

        foreach($categories as $category){
            $category->photos;
        }
        // echo "<pre>".json_encode($categories,JSON_PRETTY_PRINT)."<pre>";
        return view('admin.photo.create', ['categories' => $categories, 'tags' => $tags]);
    }

    function store(Request $request){
        $title = $request->title;
        $image = $request->file("image")->store("public");
        $description = $request->description;
        $tags = $request->input('tags');
        $category = $request->get('category');

        $photo = new Photo;
        $photo->title = $title;
        $photo->category_id = $category;
        $photo->image = $image;
        $photo->save();

        $id = $photo->id;

        $descrip = new Photo_description;
        $descrip->photo_id = $id;
        $descrip->content = $description;
        $descrip->save();

        foreach($tags as $tag){
            $taggable = new Taggable;
            $taggable->tag_id = $tag;
            $taggable->photo_id = $id;
            $taggable->save();
        }

        redirect("/admin/photos");
    }

    function edit($id){
        $categories = Category::all();
        $tags = Tag::all();
        $photo = Photo::find($id);
        $photo->photo_description;

        foreach($categories as $category){
            $category->photos;
        }
        return view('admin.photo.edit',['categories' => $categories, 'tags' => $tags, 'photo' => $photo]);
    }

    function update($id,Request $request){
        $titleEdit = $request->titleEdit;
        $imageEdit = $request->file("imageEdit")->store("public");
        $descriptionEdit = $request->descriptionEdit;
        $tagsEdit = $request->input('tagsEdit');
        $categoryEdit = $request->get('categoryEdit');

        $photo = Photo::find($id);
        $photo->title = $titleEdit;
        $photo->category_id = $categoryEdit;
        $photo->image = $imageEdit;
        $photo->save();

        $idPhoto = $photo->id;

        $descrip = Photo_description::where('photo_id','=',$idPhoto)->get();
        // $descrip->photo_id = $idPhoto;
        $descrip->content = $descriptionEdit;
        $descrip->save();

        // foreach($tagsEdit as $tag){
        //     $taggable = Taggable::find($id);
        //     $taggable->tag_id = $tag;
        //     $taggable->photo_id = $id;
        //     $taggable->save();
        // }

        return redirect('admin/photos');
    }
}
