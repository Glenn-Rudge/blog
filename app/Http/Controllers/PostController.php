<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StorePostRequest;
    use App\Http\Requests\UpdatePostRequest;
    use App\Models\Comment;
    use App\Models\Image;
    use App\Models\Post;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;


    class PostController extends Controller
    {
        public function create ()
        {
            return view("posts.create");
        }

        public function store (StorePostRequest $request)
        {
            $validatedData = $request->validated();

            $validatedData["user_id"] = Auth::id();

            if ($validatedData && Auth::check()) {
                $post = Post::create($validatedData);

                if ($request->hasFile("thumbnail")) {
                    $path = $request->file("thumbnail")->store("thumbnails");
                    $post->image()->save(
                        Image::create(["path" => $path])
                    );
                }

                return view("dashboard", ["posts" => Post::orderBy("created_at", "DESC")->paginate(5)]);
            }
        }

        public function show (Post $post)
        {
            views($post)->cooldown(1)->record();

            $comments = Comment::orderBy("created_at", "DESC")->get();

            return view("posts.show", [
                "post" => $post,
                "comments" => $comments,
            ]);
        }

        public function edit (Post $post)
        {
            return view("posts.edit", ["post" => $post]);
        }

        public function update (UpdatePostRequest $request, Post $post)
        {
            $validatedData = $request->validated();

            $validatedData["user_id"] = Auth::id();

            if ($validatedData && Auth::check()) {
                $post->update($validatedData);

                if ($request->hasFile("thumbnail")) {
                    $path = $request->file("thumbnail")->store("thumbnails");
                    $post->image()->save(
                        Image::create(["path" => $path])
                    );
                }

                return redirect("dashboard");
            }
        }

        public function destroy (Post $post, Request $request)
        {
            $post->delete();

            $request->session()->flash("status", "{$post->title}  deleted successfully");

            return redirect("dashboard");
        }
    }
