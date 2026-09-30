<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {

        $perPage = $request->input('per_page', 12);
        $contacts = Contact::paginate($perPage);
        return response()->json([
            'status' => 200,
            'message' => 'Contact list fetched successfully.',
            $contacts
        ]);
    }
    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create([
            'name' => $request->validated('name'),
            'phone' => $request->validated('phone'),
            'email' => $request->validated('email'),
            'status' => $request->validated('status', 'invalid'),
        ]);

        return response()->json($contact, 201,);
    }

    public function update(StoreContactRequest $request, int $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->name = $request->name;

        $contact->email = $request->email;
        $contact->phone = $request->phone;
        if ($request->filled('status')) {
            $contact->status = $request->status;
        }

        $contact->save();

        return response()->json([
            'status' => 200,
            'message' => "{$contact->name} updated successfully"
        ]);
    }
    public function show(int $id)
    {
        $contact = Contact::findOrFail($id);

        return response()->json([
            'status' => 200,
            'message' => "{$contact->name} detail fetched successfully",
            "data" => $contact
        ]);
    }

   public function destroy(Contact $contact)
    {
        $contactName = $contact->name;
        $contact->delete();

        return response()->json([
            'message' => "{$contactName} has been archived successfully"
        ]);
    }



    public function archived()
    {
        $contact = Contact::onlyTrashed()->get();
        return response()->json([
            "status" => 200,
            "message" => "Archived contact fetched successfully.",
            "data" => $contact,
        ]);
    }

    public function restore(Contact $contact)
    {
        $contactName = $contact->name;

        $contact->restore();

        return response()->json([
            'message' => "{$contactName} has been restored successfully",
        ]);
    }

}
