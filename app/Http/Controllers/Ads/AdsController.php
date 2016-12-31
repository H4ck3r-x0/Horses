<?php

namespace App\Http\Controllers\Ads;

use App\Ad;
use App\User;
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
      return view('Ads.index');
    }

    /**
     * create a new ad.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return view('Ads.create');
     }


     /**
      * store the new ad to the database.
      *
      * @return \Illuminate\Http\Response
      */
      public function store(Request $request)
      {
            $this->validate($request, [
              'title' => 'required|unique:ads|max:255',
              'description' => 'required',
              'location' => 'required',
            ]);
      }


      /**
       * Ad Media.
       *
       * @return \Illuminate\Http\Response
       */
       public function media()
       {
         return view('Ads.createStep2');
       }


      /**
       * Ad stor Media.
       *
       * @return \Illuminate\Http\Response
       */
       public function storeMedia(Request $request)
       {
         dd( $request->file('file'));
       }


}
