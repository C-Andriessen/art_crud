<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtStoreValidation;
use App\Http\Requests\ArtUpdateValidation;
use App\Models\Art;
use App\Models\User;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function index()
    {
        $this->authorize('isAdmin', User::class);
        $arts = Art::orderByDesc('created_at')->paginate(30);
        return view('admin.art.index', compact('arts'));
    }

    public function show(Art $art)
    {
        return view('art.show', compact('art'));
    }

    public function create()
    {
        $this->authorize('isAdmin', User::class);
        return view('admin.art.create');
    }

    public function search(Request $request)
    {
        $this->authorize('isAdmin', User::class);
        $arts = Art::where('title', 'LIKE', "%{$request->q}%")->orderByDesc('created_at')->paginate(30);
        return view('admin.art.index', compact('arts'));
    }

    public function store(ArtStoreValidation $request)
    {
        $art = new Art;
        $art->title = $request->title;
        $imageName = time() . uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $art->image = $imageName;
        $art->save();

        return redirect()->route('admin.art.index')->with('status', 'Kunstwerk is toegevoegd');
    }

    public function edit(Art $art)
    {
        $this->authorize('isAdmin', User::class);
        return view('admin.art.edit', compact('art'));
    }

    public function update(ArtUpdateValidation $request, Art $art)
    {
        $art->title = $request->title;
        if ($request->image)
        {
            if ($art->image)
            {
                unlink(public_path('/images/' . $art->image));
            }
            $imageName = time() . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $art->image = $imageName;
        }
        $art->save();

        return redirect()->route('admin.art.index')->with('status', 'Kunstwerk is bijgewerkt');
    }

    public function destroy(Art $art)
    {
        $this->authorize('isAdmin', User::class);
        unlink(public_path('/images/' . $art->image));
        $art->delete();
        return redirect()->route('admin.art.index')->with('status', 'Kunstwerk is verwijderd');
    }
}
