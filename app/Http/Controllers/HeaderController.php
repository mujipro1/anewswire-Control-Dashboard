<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\WebsiteData;
use App\Models\Categories;
use Illuminate\Http\Request;

class HeaderController extends Controller
{

    public function index()
    {
        $headers = WebsiteData::with('websites')->get(); // Eager load websites
        $websites = Website::all();
        return view('pages.headersPage', ['headers' => $headers, 'websites'=>$websites]);
    }


    public function update(Request $request, $header_id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:website_data,name,' . $header_id . ',dataid,name,Default Header',
            'description' => 'nullable|string',
            'links' => 'required|array',
        ]);

        $header = WebsiteData::findOrFail($header_id);
        $header->update([
            'name' => $request->name,
            'description' => $request->description,
            'header_links' => json_encode($request->links) ?? [], // Handle null links
        ]);
        $currentWebsiteIds = $header->websites->pluck('id')->toArray();
        $newWebsiteIds = $request->websites ?? []; // Handle null websites
        
        // If there are current websites to potentially remove
        if (!empty($currentWebsiteIds)) {
            Website::whereIn('id', $currentWebsiteIds)
                ->whereNotIn('id', $newWebsiteIds)
                ->update(['data_id' => null]);
        }
        
        // If there are new websites to assign
        if (!empty($newWebsiteIds)) {
            Website::whereIn('id', $newWebsiteIds)
                ->update(['data_id' => $header->dataid]);
        }

        return redirect()->route('headers')->with('success', 'Header updated successfully.');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:website_data,name,NULL,dataid,name,Default Header',
            'description' => 'nullable|string',
            'links' => 'required|array',
        ]);
        
        // Create the header
        $header = WebsiteData::create([
            'name' => $request->name,
            'description' => $request->description,
            'header_links' => json_encode($request->links),
            'websites' => [],
        ]);
        
        return redirect()->route('headers')->with('success', 'Header added successfully.');
    }

    public function add(){
        return view('pages.addNewHeader');
    }

    public function destroy(Request $request)
    {
        $header = WebsiteData::findOrFail($request->header_id);

        // Check if there are any websites linked to this header
        if ($header->websites->isNotEmpty()) {
            return redirect()->back()->with('error', 'Please remove all websites linked to this header before deleting.');
        }

        // Delete the header
        $header->delete();

        return redirect()->route('headers')->with('success', 'Header deleted successfully.');
    }

    public function getEdit($id){
        $header = WebsiteData::where('dataid',$id)->first();
        if (!$header) {
            return redirect()->route('headers')->with('error', 'Header not found.');
        }
        $websites = Website::all();
        return view('pages.editHeader', ['header' => $header, 'websites' => $websites]);
    }
}
