<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DimensionController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestingAPI;
use App\Http\Controllers\Survey\SurveyAnswerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/












Route::middleware("setLocale")->group(function(){

    Route::get('/', [AuthController::class, "index"]);

    Route::get('languagechange', function(){
        if(session()->has('locale') && session()->get('locale') == 'id'){
            session()->put('locale', 'en');
        }
        else{
            session()->put('locale', 'id');
        }
        return redirect()->back()->with("success", "Successfully change language");
    });

    Route::middleware('owner')->group(function(){
        Route::resource('admins', AdminController::class)->only(["index", "destroy"]);
        ROute::get("/admins/accept/{admin}", [AdminController::class, "accept"]);
    });

    Route::middleware('admin')->group(function(){
        Route::resource('surveys', SurveyController::class)->only(['show', 'store', 'destroy']);

        Route::prefix('/surveys/{survey}')->group(function(){
            Route::resource('dimensions', DimensionController::class)->only(['show', 'store', 'update', 'destroy']);

            Route::prefix('dimensions/{dimension}')->group(function(){
                Route::resource('indicators', IndicatorController::class)->only(['show', 'store', 'update', 'destroy']);

                Route::prefix('indicators/{indicator}')->group(function(){
                    Route::resource('questions', QuestionController::class)->only(['store', 'update', 'destroy']);
                });
            });
        });

        Route::prefix('participants')->group(function(){
            Route::get("/search", [ParticipantController::class, "filtered_search_participant"]);

            Route::get("/province/{province}", [ParticipantController::class, "filtered_province_participant"]);
            Route::get("/province/{province}/search", [ParticipantController::class, "filtered_province_search_participant"]);

            Route::get("/city/{city}", [ParticipantController::class, "filtered_city_participant"]);
            Route::get("/city/{city}/search", [ParticipantController::class, "filtered_city_search_participant"]);
        });
        Route::resource('participants', ParticipantController::class)->only(['index', 'show', 'destroy']);

        Route::resource('responses', ResponseController::class)->only(['show', 'destroy']);

        Route::prefix('/responses/{response}')->group(function(){
            Route::get("/search", [ResponseController::class, "filtered_search_response"]);

            Route::get("/dimension/{dimension}", [ResponseController::class, "filtered_dimension_response"]);
            Route::get("/dimension/{dimension}/search", [ResponseController::class, "filtered_dimension_search_response"]);

            Route::get("/indicator/{indicator}", [ResponseController::class, "filtered_indicator_response"]);
            Route::get("/indicator/{indicator}/search", [ResponseController::class, "filtered_indicator_search_response"]);
        });

        Route::get('/logout', [AuthController::class, "logout"]);
    });

    Route::middleware("guest")->group(function(){
        Route::get('/login', function(){
            return view('guests.login');
        });

        Route::post('/login', [AuthController::class, "login"]);

        Route::get('/register', function(){
            return view('guests.register');
        });

        Route::post('/register', [AdminController::class, "store"]);
    });


    Route::get('/answer', [SurveyAnswerController::class,"index"]);
    Route::post('/answerSubmit',[TestingAPI::class,"submitData"])->name('answerSubmit');





});




