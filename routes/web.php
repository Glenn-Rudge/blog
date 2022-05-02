<?php

    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\PostController;
    use App\Models\Post;
    use App\Models\Tag;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome', [
            "posts" => Post::with("comments")
                ->orderBy("created_at", "DESC")
                ->paginate(5),
                "tags" => Tag::all()
            ]
        );
    });

    Route::get('/dashboard', function () {
        return view('dashboard', ["posts" => Post::orderBy("created_at")->paginate(5)]);
    })->middleware(['auth'])->name('dashboard');

    Route::get("/posts", [PostController::class, "index"]);
    Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
    Route::get("/posts/{post}", [PostController::class, "show"])->name("posts.show");
    Route::post("/posts/store", [PostController::class, "store"])->name("posts.store");
    Route::get("/posts/{post}/edit", [PostController::class, "edit"])->name("posts.edit");
    Route::put("/posts/update/{post}", [PostController::class, "update"])->name("posts.update");
    Route::put("/posts/{post}", [PostController::class, "update"])->name("posts.update");
    Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("posts.delete");
    Route::post("/comments/", [CommentController::class, "store"])->name("comments.store");

    // Artisan Commands
    Route::get("/storage-link/", function () {
        Artisan::call("storage:link");
    });

    require __DIR__ . '/auth.php';
//
    //    TODO:// Add tags to post
    //    TODO:// look for a better text editor
    //    TODO:// Add profile picture to user profile.
    //    TODO:// return user specific posts on dashboard.
    //    TODO:// More dynamic queries for posts and comments
