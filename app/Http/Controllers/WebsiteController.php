<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\WebsiteData;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{

    public function index(){
        $websites = Website::with('websiteData')->get();
        $categories = Categories::all();
        return view('pages.websites', ['websites' => $websites, '_categories'=>$categories]);
    }

    public function site_details($id){
        $siteData = Website::with('websiteData')->where('id', $id)->first();
        return view('components.siteControl', ['siteData' => $siteData]);
     }

     public function store(Request $request)
     {
         $request->validate([
             'site_name'  => 'required|string|max:255',
             'link'       => 'required|string|max:255',
             'categories' => 'required|array',
             'categories.*' => 'string',
             'contact_num'      => 'required|string|max:255',
             'contact_email'      => 'required|string|max:255',
             'address'    => 'required|string|max:255',
             'logo'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'gtm'        => 'nullable|string|max:255',
         ]);
     
         $websiteData = WebsiteData::where('name', 'Default Header')->first();

        //  $logoData = $request->file('logo') ? file_get_contents($request->file('logo')->getRealPath()) : null;


         $logoData = file_get_contents($request->file('logo')->getRealPath());

            DB::table('websites')->insert([
                'site_name' => $request->site_name,
                'link' => $request->link,
                'about_us' => $request->about_us,
                'categories' => json_encode($request->categories),
                'data_id' => $websiteData->dataid,
                'phone' => $request->contact_num,
                'email' => $request->contact_email,
                'address' => $request->address,
                'logo' => $logoData ,
                'gtm' => $request->gtm,
                'created_at' => now(),
                'updated_at' => now()
            ]);


         return redirect()->route('websites')->with('success', 'Site added successfully!');
     }
     

     public function edit(Request $request)
     {
         $website = Website::where('id', $request->site_id)->first();
         if (!$website) {
             return redirect()->route('websites')->with('error', 'Website not found');
         }
     
         $request->validate([
             'site_name'  => 'required|string|max:255',
             'link'       => 'required|string|max:255',
             'about_us'   => 'required|string',
             'categories' => 'required|array',
             'categories.*' => 'string',
             'contact_num'      => 'required|string|max:255',
             'contact_email'      => 'required|string|max:255',
             'address'    => 'required|string|max:255',
             'logo'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'gtm'        => 'nullable|string|max:255',
         ]);
     
         $logoData = $request->file('logo') ? file_get_contents($request->file('logo')->getRealPath()) : $website->logo;

         DB::table('websites')->where('id', $request->site_id)->update([
             'site_name' => $request->site_name,
             'link' => $request->link,
             'about_us' => $request->about_us,
             'categories' => json_encode($request->categories),
             'phone' => $request->contact_num,
             'email' => $request->contact_email,
             'address' => $request->address,
             'logo' => $logoData,
             'gtm' => $request->gtm,
             'updated_at' => now()
         ]);
     
         return redirect()->route('websites')->with('success', 'Site updated successfully');
     }
     

    public function destroy($id){
        $website = Website::findOrFail($id);
        $website->delete();
        return redirect()->back()->with('success', 'Website deleted successfully.');
    }

    public function new(){
        $categories = Categories::all();
        return view('pages.addNewWebsite' , ['_categories' => $categories, 'isEdit' => 0]);
    }

    public function getEdit($id){
        $website = Website::where('id', $id)->first();
        if (!$website) {
            return redirect()->route('websites')->with('error', 'Website not found');
        }
        $categories = Categories::all();
        return view('pages.addNewWebsite' , ['_categories' => $categories, 'isEdit' => 1, 'website' => $website]);
    }

    public function getLogo($id){

    $website = Website::find($id);
    $logoData = $website->logo;

    return response($logoData)
        ->header('Content-Type', 'image/jpeg');
    }

}
