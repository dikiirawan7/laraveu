<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Post;
class PostController extends Controller
{
    //
    public function store(Request $request){
        $post   =   new Post([
            'title' =>  $request->get('title'),
            'body'  =>  $request->get('body')
        ]);

        $post->save();

        return response()->json('success');
    }

    public function index()
    {
        
      return new PostCollection(Post::all());
      
    }
    public function paging(){
        return new PostCollection(Post::paginate(5));
        
    }
    public function cari($title=''){
        if($title==''){
            $cari='';
        }
        else{
            $cari=$title;
        }
        return new PostCollection(Post::where('title','like','%'.$cari.'%')->orderBy('id','desc')->paginate(5));
    }
    public function edit($id){
        $post  =   Post::find($id);
        return response()->json($post);
    }

    public function update($id,Request $request){
        $post = Post::find($id);
        $post->update($request->all());
        return response()->json('Update Sukses');
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return response()->json('sukses menghapus');
    }
   /* public function tes($oke){
        $semua= new PostCollection(Post::where('id','=',$oke)->get());
      dd($semua);
    }
    */
    
}
