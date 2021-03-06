<?php

    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\PostController;
    use App\Http\Controllers\PostTagController;
    use App\Models\Post;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\ProfileController;

    Route::get("/", function () {
        return view("welcome", [
                "posts" => Post::with("comments")
                    ->with("tags")
                    ->orderBy("created_at", "DESC")
                    ->paginate(5),
                "user" => Auth::user(),
            ]
        );
    })->name("welcome");
//Post::latest()->withCount("comments")->with("user")->get();
    Route::get("/dashboard", function () {
        return view("dashboard", ["posts" => Post::orderBy("created_at")->paginate(5)]);
    })->middleware(["admin"])->name("dashboard");


    Route::get("/posts", [PostController::class, "index"]);
    Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
    Route::get("/posts/{post}", [PostController::class, "show"])->name("posts.show");
    Route::post("/posts/store", [PostController::class, "store"])->name("posts.store");
    Route::get("/posts/{post}/edit", [PostController::class, "edit"])->name("posts.edit");
    Route::put("/posts/update/{post}", [PostController::class, "update"])->name("posts.update");
    Route::put("/posts/{post}", [PostController::class, "update"])->name("posts.update");
    Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("posts.delete");
    Route::get("/posts/tag/{tag}", [PostTagController::class, "index"])->name("posts.tags.index");

    Route::post("/comments", [CommentController::class, "store"])->name("comments.store");

    Route::get("/profile", [ProfileController::class, "index"])->name("users.profile");

    require __DIR__ . "/auth.php";
    //
    //    TODO:// Add tags to post
    //    TODO:// Add profile picture to user profile.
    //    TODO:// return user specific posts on dashboard.
    //    TODO:// More dynamic queries for posts and comments
