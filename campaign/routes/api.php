<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/campaigns', [CampaignController::class, "index"]);
Route::post('/campaigns', [CampaignController::class, "store"]);
Route::delete('/campaigns/{campaign}', [CampaignController::class, "destroy"]);
Route::get('/campaigns/archived', [CampaignController::class, "archived"]);

Route::put('/campaigns/{campaign}/restore', [CampaignController::class, "restore"])->withTrashed();
Route::put('/campaigns/{campaigns}', [CampaignController::class, "update"]);
Route::get('/campaigns/{campaigns}', [CampaignController::class, "show"]);
