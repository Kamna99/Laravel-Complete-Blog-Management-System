<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use Session;
use Illuminate\Http\Request;
use App\Category;
use Auth;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags=Tag::all();
        if($categories->count()==0 || $tags->count()==0)
        {
            Session::flash('info','You must have some categories and tags before attempting to create a post');
            return redirect()->back();
        }
        
        return view('admin.posts.create')->with('categories',$categories)->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required'
        ]);
        $featured=$request->featured;
        $featured_new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);
        
        $post = Post::create([
        'title'=>$request->title,
        'featured'=>'uploads/posts/'.$featured_new_name,
        'content'=>$request->content,
        'category_id'=>$request->category_id,
        'slug'=>str_slug($request->title),
        'user_id'=>Auth::id()
           
    ]);
        $post->tags()->attach($request->tags);
        
        Session::flash('success','Post created successfully');
        
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $post= Post::find($id);
        $this->validate($request,[
            'title' => 'required|max:255',
            'content'=>'required',
            'category_id'=>'required'
        ]);
        
        if($request->hasFile('featured'))
        {
            $featured=$request->featured;
            $featured_new_name=time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
            
        }
    
        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        Session::flash('success','You have successfully updated a post');
        return redirect()->route('posts');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        Session::flash('success','You have successfully trashed a post');
        return redirect()->route('posts');
        
    }
    
    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('posts',$posts);
        //dd($posts);
        
    }
    
    public function kill($id) {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post Deleted Permanently');
        return redirect()->back();
    }
    
    public function restore($id){
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post Restored Successfully');
        return redirect()->back();
    }
}
