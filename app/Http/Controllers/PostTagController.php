<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Tag;

    class PostTagController extends Controller
    {
        public function index ($tag)
        {
            return view("welcome", ["posts" => Tag::findOrFail($tag)->posts()
                ->withCount('comments')
                ->with('user')
                ->with('tags')
                ->latest()->get()]);
        }
    }
