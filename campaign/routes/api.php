<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/campaigns', [CampaignController::class, "index"]);
Route::post('/campaigns', [CampaignController::class, "store"]);
Route::delete('/campaigns/{campaign}', [CampaignController::class, "destroy"]);
Route::get('/campaigns/archived', [CampaignController::class, "archived"]);

Route::put('/campaigns/{campaign}/restore', [CampaignController::class, "restore"])->withTrashed();
Route::put('/campaigns/{campaigns}', [CampaignController::class, "update"]);
Route::get('/campaigns/{campaigns}', [CampaignController::class, "show"]);

Route::get('/contacts',[ContactController::class,'index']);
Route::post('/contacts',[ContactController::class,'store']);
Route::put('/contacts/{contact}',[ContactController::class, 'update']);
Route::delete('/contacts/{contact}', [ContactController::class, "destroy"]);
Route::get('/contacts/archived', [ContactController::class, "archived"]);

Route::put('/contacts/{contact}/restore', [ContactController::class, "restore"])->withTrashed();
Route::get('/contacts/{contacts}', [ContactController::class, "show"]);
