<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Prodi;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index(Request $request)
    {
        $prodi = Prodi::all();
        $cari = $request->input('cari');
        if (!empty($cari)) {
            $events = Event::where('nama', 'like', '%' . $cari . '%')->orderBy('created_at', 'desc')->take(10)->paginate(10);
        } else {
            $events = Event::orderBy('created_at', 'desc')->take(10)->paginate(10);
        }
        $news = Event::orderBy('created_at', 'desc')->take(3)->get();
        return view('event', compact('events', 'news', 'prodi'));
    }
}
