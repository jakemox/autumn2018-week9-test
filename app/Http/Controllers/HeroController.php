<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;
use App\Image;
use App\Emergency;
use Auth;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::orderBy('name', 'asc')->get();
        $images = Image::get();
        
        $view = view('hero/index', compact(['heroes', 'images']));

        return $view;
    }    


    public function show($hero_slug)
    {
        $hero = \App\Hero::where('slug', $hero_slug)->first();

        if (!$hero) {
            abort(404, 'Hero not found');
        }

        $view = view('hero/show');
        $view->hero = $hero;
        return $view;
    }

    public function store(Request $request, $hero_slug)
    {
        $id = Auth::id();
        
        $emergency = Emergency::create([
            'subject' => $request->subject,
            'description' => $request->description,
        ]);

        return redirect(action('HeroController@index'));
    }
}
