<?php

namespace App\Http\Controllers\Ads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
  /**
   * Show all ads.
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {
      return view('ads.index');
    }
}
