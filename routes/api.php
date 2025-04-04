<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleLikeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfilUserController;

use App\Http\Controllers\TagsController;
use App\Http\Controllers\VueController;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route securisée
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('articles/{articleId}/likes', ArticleLikeController::class);
    Route::apiResource('/articles', ArticleController::class)->except('index');
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/comments', CommentController::class);
    Route::get('/profil',ProfilUserController::class);
});



Route::apiResource('/newsletters', NewsletterController::class);



Route::get('/getAllArticle', [ArticleController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('/tags', TagsController::class);
Route::apiResource('/vues', VueController::class);
