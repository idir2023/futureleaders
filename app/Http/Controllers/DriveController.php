<?php

namespace App\Http\Controllers;

use App\Models\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    public function index()
    {
        $drives = Drive::latest()->paginate(5);
        return view('admin.drives.index', compact('drives'));
    }

    public function create()
    {
        return view('admin.drives.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'drive_link' => 'required|url',
            'duration' => 'required|string|max:255',
        ]);

        Drive::create($request->only('drive_link', 'duration'));

        return redirect()->route('drives.index')->with('success', 'Drive créé avec succès.');
    }

    public function show(Drive $drive)
    {
        return view('admin.drives.show', compact('drive'));
    }

    public function edit(Drive $drive)
    {
        return view('admin.drives.edit', compact('drive'));
    }

    public function update(Request $request, Drive $drive)
    {
        $request->validate([
            'drive_link' => 'required|url',
            'duration' => 'required|string|max:255',
        ]);

        $drive->update($request->only('drive_link', 'duration'));

        return redirect()->route('drives.index')->with('success', 'Drive mis à jour avec succès.');
    }

    public function destroy(Drive $drive)
    {
        $drive->delete();

        return response()->json(['success' => true]);
    }
}
