<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Scraper\ScraperServices\GoutteScraperService;

class ScraperController extends Controller
{
    /**
     * Get all the jobs openings at a specified url
     */
    public function index(GoutteScraperService $goutteScraperService)
    {         
        return view('welcome');
    }
}
