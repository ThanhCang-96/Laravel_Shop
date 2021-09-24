<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Rating;
use App\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = Blog::paginate(3);
    return View('frontend.blog.list', compact('data'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $data = Blog::find($id);
    $sumRate = 0;
    $avgRate = 0;
    $rates = $data->rates;
    if($rates)
    {
      foreach($rates as $rate)
      {
        $sumRate += $rate->rate;
      }
      if($rates->count()!= 0)
      {
        $avgRate = round($sumRate/$rates->count(), 1);
      }
    }
    $author = User::find($data->id);
    $comment = $data->comments->where('blog_id', $id);
    return View('frontend.blog.blog-detail', array(
      'data' => $data,
      'author' => $author,
      'comment' => $comment,
      'avgRate' =>$avgRate
    ));
  }

  public function ajax_rate(Request $request)
  {
    $data = $request->all();
    $blogId = $data['idBlog'];
    $userId = Auth::id();
    $rate = $data['value'];

    $rateInput = array(
      'blog_id' => $blogId,
      'user_id' => $userId,
      'rate' => $rate
    );

    $input = Rating::create($rateInput);
  }
}
