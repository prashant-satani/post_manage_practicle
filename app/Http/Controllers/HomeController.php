<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $posts = Post::query()
                    ->when(session('viewed_posts'), function($query){
                        $query->whereNotIn('id', session('viewed_posts'));
                    })
                    ->with(['tags'])
                    ->limit(5)
                    ->inRandomOrder()
                    ->get();

        // Store post in session to ensure not repeated
        session()->put('viewed_posts', $posts->pluck('id')->merge(session('viewed_posts'))->unique()->all());
        return view('dashboard', [
            'posts' => $posts
        ]);
    }
}
