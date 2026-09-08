<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaignRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 12);

        $campaigns = Campaign::paginate($perPage);

        return response()->json($campaigns);
    }

    public function store(StoreCampaignRequest $request)
    {
        $campaign = Campaign::create([
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
            'status' => $request->validated('status', 'draft'),
        ]);

        return response()->json($campaign, 201);
    }

    public function destroy(Campaign $campaign)
    {
        $campaignName = $campaign->name;
        $campaign->delete();

        return response()->json([
            'message' => "{$campaignName} has been archived successfully"
        ]);
    }

    public function archived()
    {
        $campaigns = Campaign::onlyTrashed()->get();
        return response()->json([
            "status" => 200,
            "message" => "Archived campaign fetched successfully.",
            "data" => $campaigns,
        ]);
    }

    public function restore(Campaign $campaign)
    {
        $campaignName = $campaign->name;

        $campaign->restore();

        return response()->json([
            'message' => "{$campaignName} has been restored successfully",
        ]);
    }

    public function update(StoreCampaignRequest $request, int $id)
    {
        $campaign = Campaign::findOrFail($id);

        $campaign->name  = $request->name;
        $campaign->description = $request->description;
        $campaign->status = $request->status;

        $campaign->save();

        return response()->json([
            'status' => 200,
            'message' => "{$campaign->name} updated successfully"
        ]);
    }

    public function show(int $id)
    {
        $campaign = Campaign::findOrFail($id);

        return response()->json([
            'status' => 200,
            'message' => "{$campaign->name} detail fetched successfully",
            "data" => $campaign
        ]);
    }
}
