<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Article;
use App\Models\Website;
use App\Models\Categories;
use App\Models\User;
use App\Models\WebsiteData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index(){

        $articles = Article::all();
        $websites = Website::all();
        
        return view('pages.rssdatapage', ['articles' => $articles, 'websites' => $websites]);
    }


     public function updateSite(Request $request, $id)
     {
         $site = Website::findOrFail($id);
         $websiteData = WebsiteData::findOrFail($site->data_id);
     
         // Handle logo upload
         if ($request->hasFile('logo')) {
             $logoPath = $request->file('logo')->store('logos', 'public');
             $websiteData->logo = $logoPath;
         }
     
         // Update fields
         $websiteData->header_links = json_encode($request->input('header_links', []));
         $websiteData->footer_links = json_encode($request->input('footer_links', []));
         $websiteData->footer_text = $request->input('footer_text');
     
         // Store "About Us" content
         $websiteData->about_us = $request->input('about_us');
     
         $websiteData->save();
     
         return redirect()->route('site.details', $id)->with('success', 'Site updated successfully');
     }
     
        public function articlePage($id){
            $article = Article::findOrFail($id);
            if (!$article) {
                return redirect()->route('home')->with('error', 'Article not found');
            }
            return view('pages.articlePage', ['article' => $article]);
        }

        public function homeArticlePage($id){
            $article = Article::findOrFail($id);
            if (!$article) {
                return redirect()->route('home')->with('error', 'Article not found');
            }
            return view('landing.articlePage', ['article' => $article]);
        }

        public function homeArticles(){
            $articles = Article::all();
            return view('landing.articles', ['articles' => $articles]);
        }

        public function login(Request $request) {
            $user = User::where('email', $request->email)->first();

            if (Session::get('user_id')) {
                return redirect()->route('dashboard');
            }
        
            if ($user && Hash::check($request->password, $user->password)) {
                Session::put('user_id', $user->id); // Store user session manually
                return redirect()->route('dashboard');
            }
        
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        public function userProfile(){
            $user = User::findOrFail(Session::get('user_id'));
            return view('pages.userProfile', ['user' => $user]);
        }

        public function updateProfile(Request $request){
            $user = User::findOrFail(Session::get('user_id'));
        
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
        
            $user->email = $request->email;
        
            if ($request->new_password) {
                $user->password = Hash::make($request->new_password);
            }
        
            $user->save();
        
            return redirect()->route('user')->with('success', 'Profile updated successfully');
        }

        public function logout(){
            Session::forget('user_id');
            return redirect()->route('home');
        }
        
}