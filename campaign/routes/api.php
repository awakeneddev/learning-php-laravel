<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("/campaigns")->group(function () {
    Route::get('/', [CampaignController::class, "index"]);
    Route::post('/', [CampaignController::class, "store"]);
    Route::delete('/{campaign}', [CampaignController::class, "destroy"]);
    Route::get('/archived', [CampaignController::class, "archived"]);

    Route::put('/{campaign}/restore', [CampaignController::class, "restore"])->withTrashed();
    Route::put('/{campaigns}', [CampaignController::class, "update"]);
    Route::get('/{campaigns}', [CampaignController::class, "show"]);

    // get campaign contact list$campaigns
    Route::get("/{campaign}/contacts", [CampaignController::class, "showCampaignContact"]);
    Route::post("/{campaign}/contacts", [CampaignController::class, "storeContact"]);
    Route::delete("/{campaign}/contacts", [CampaignController::class, "removeContact"]);
});

Route::prefix('/contacts')->group(function () {

    Route::get('/', [ContactController::class, 'index']);
    Route::post('/', [ContactController::class, 'store']);
    Route::put('/{contact}', [ContactController::class, 'update']);
    Route::delete('/{contact}', [ContactController::class, "destroy"]);
    Route::get('/archived', [ContactController::class, "archived"]);

    Route::put('/{contact}/restore', [ContactController::class, "restore"])->withTrashed();
    Route::get('/{contacts}', [ContactController::class, "show"]);
});
