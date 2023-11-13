<?php

namespace App\Http\Controllers;
use App\Models\Seo;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function seoHomePage(){
        $data = Seo::where('id', 1)->first();
        return view('backend.seo_homepage', compact('data'));
    }

    public function updateSeoHomePage(Request $request){

        Seo::where('id', 1)->update([
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Homepage SEO Updated', 'Success');
        return back();
    }

    public function generateSitemap(){

        if(file_exists(public_path("sitemap.xml"))){
            unlink(public_path("sitemap.xml"));
        }
        ini_set('max_execution_time', '300');
        $path = public_path('sitemap.xml');
        $baseUrl = URL::to('/');
        SitemapGenerator::create($baseUrl)->writeToFile($path);

        Seo::where('id', 1)->update([
            'sitemap_generate_time' => Carbon::now()
        ]);

        Toastr::success('Sitemap Generated', 'Success');
        return back();
    }

    public function uploadSitemap(Request $request){

        $request->validate([
            'sitemap' => 'required|mimes:xml|max:2048'
        ]);

        if(file_exists(public_path("sitemap.xml"))){
            unlink(public_path("sitemap.xml"));
        }

        if ($request->hasFile('sitemap')){
            $file = $request->file('sitemap');
            $file_name = 'sitemap' . '.' . $file->getClientOriginalExtension();
            $location = public_path();
            $file->move($location, $file_name);
        }

        Seo::where('id', 1)->update([
            'sitemap_generate_time' => Carbon::now()
        ]);

        Toastr::success('Sitemap Generated', 'Success');
        return back();
    }

}
