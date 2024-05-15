<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'detail' => 'required|string',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $event = new Event([
            'nama' => $request->get('nama'),
            'detail' => $request->get('detail'),
            'tanggal' => $request->get('tanggal'),
            'keterangan' => $request->get('keterangan'),
        ]);
        $event->save();

        return redirect()->route('admin.event')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'detail' => 'required|string',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $event = Event::findOrFail($id);
        $event->nama = $request->get('nama');
        $event->detail = $request->get('detail');
        $event->tanggal = $request->get('tanggal');
        $event->keterangan = $request->get('keterangan');
        $event->save();

        return redirect()->route('admin.event')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.event')->with('success', 'Event berhasil dihapus.');
    }
}
