<?php

    namespace App\Http\Controllers;

    use App\Models\Comment;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Post;


    class CommentController extends Controller
    {
        public function store (Request $request)
        {
            $post = Post::findOrFail($request->post_id);

            $validatedData = $this->validate($request, [
                "content" => "string|required|min:10",
            ]);

            $validatedData["user_id"] = Auth::id();
            $validatedData["post_id"] = $post->id;
            Comment::create($validatedData);


            return redirect()->route('posts.show', $post->id);
        }

        public function edit ($id)
        {
            //
        }

        public function update (Request $request, $id)
        {
            //
        }

        public function destroy ($id)
        {
            //
        }
    }
