<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
       $this->middleware('auth');
   }
  
  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
  public function index()
  {
    $data = Blog::all();
    return View('admin.blog.list', array(
      'user' => Auth::user(),
      'blog' => $data
    ));
  }

  /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
  public function create()
  {
    $user = Auth::user();
    return View('admin.blog.create', compact('user'));
  }

  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  public function store(BlogRequest $request)
  {
    $data = $request->all();
    
    if($request->hasFile('image')){
      $image = $request->image;
      $data['image'] = $image->getClientOriginalName();
    }

    $insertBlog = Blog::create($data);
    if ($insertBlog) {
      $image->move('../public/images/blog', $image->getClientOriginalName());
      $request->session()->flash('success','Thành công');
    } else $request->session()->flash('error','Thất bại');
    return redirect('admin/blog');
  }

  /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function show($id)
  {
    $blog = Blog::find($id);
    $user = Auth::user();
    return View('admin.blog.show', array(
      'user' => $user,
      'data' => $blog
    ));
  }

  /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function edit($id)
  {
    $blog = Blog::find($id);
    $user = Auth::user();
    return View('admin.blog.edit', array(
      'user' => $user,
      'data' => $blog
    ));
  }

  /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function update(BlogRequest $request, $id)
  {
    $blog = Blog::find($id);
    $data = $request->all();

    if ($request->hasFile('image')) {
      $image = $request->image;
      $data['image'] = $image->getClientOriginalName();
    }

    if ($blog->update($data)) {
      if (!empty($image)) {
        $image->move('../public/images/blog', $image->getClientOriginalName());
      }
      $request->session()->flash('success','Thành công');
    } else{
      $request->session()->flash('error','Thất bại');
    }
    return redirect()->back();
  }

  /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function destroy(Request $request,$id)
  {
    $blog = Blog::find($id);
    if ($blog->delete()) {
      $request->session()->flash('success','Xoá thành công');
    }else {                        
      $request->session()->flash('error','Thất bại');
    }
    return redirect('admin/blog');
  }
}
