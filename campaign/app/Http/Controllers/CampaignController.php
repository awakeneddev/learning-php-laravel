<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(){
        return response()->json([
            'message' => "Campaigns"
        ]);
    }
}
