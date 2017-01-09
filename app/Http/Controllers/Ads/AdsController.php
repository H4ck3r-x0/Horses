<?php

namespace App\Http\Controllers\Ads;

use Auth;
use Image;
use App\Ad;
use App\User;
use App\AdMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
  /**
   * Show all ads.
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {
      $ads = Ad::with('adMedia', 'user')->get();
      return view('Ads.index', compact('ads'));
    }

    /**
     * create a new ad.
     *
     * @return \Illuminate\Http\Response
     */
     public function createAd()
     {
       return view('Ads.create');
     }

     /**
      * Show single ad.
      *
      * @return \Illuminate\Http\Response
      */
       public function showAd($slug)
       {
         $ad = Ad::with('adMedia', 'user')->where('slug', $slug)->first();
         return view('Ads.show', compact('ad'));
       }


     /**
      * store the new ad to the database.
      *
      * @return \Illuminate\Http\Response
      */
      public function storeAd(Request $request)
      {
            $this->validate($request, [
              'title' => 'required|max:255',
              'description' => 'required',
              'location' => 'required',
            ]);
            $user = User::find(Auth::user()->id);
            $ad = new Ad();
            $ad->title = $request->title;
            $ad->description = $request->description;
            $ad->location = $request->location;
            $ad->slug = str_slug($ad->title, '-');
            $ad->user()->associate($user);
            $ad->save();
            return redirect()->route('AdMedia', ['ad_id' => $ad->id]);
      }


      /**
       * Ad Media form.
       *
       * @return \Illuminate\Http\Response
       */
       public function media($ad_id)
       {
         $ad = Ad::where('id', $ad_id)->first();
         $ad_id = $ad->id;
         return view('Ads.createStep2', compact('ad_id'));
       }


      /**
       * Ad stor Media.
       *
       * @return \Illuminate\Http\Response
       */
       public function storeMedia(Request $request)
       {

         if($request->hasFile('file'))
         {
           // get all files from the request.
           $files = $request->file;
           $ad_id = $request->ad_id;
           $media = [];
           //Loop through the files array.
           foreach($files as $file)
           {
             $path = $file->store('ads/media');
             $img = Image::make(public_path('storage/'. $path));
             $img->resize(null, 500, function ($constraint) {
               $constraint->aspectRatio();
             });
             $img->save();
             //$media_name = explode('/', $path)[1];
             array_push($media, $path);
           }
           $serialize_media = serialize($media);
           $ad = Ad::find($ad_id);
           $adMedia = new AdMedia();
           $adMedia->media = $serialize_media;
           $adMedia->ad()->associate($ad);
           $adMedia->save();
         }

       }


}
