<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use Illuminate\Http\Request;

class ItensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itens = Itens::where('user_id', auth()->id())->get();
        return view('itens.index', compact('itens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Itens::create([
            'name' => $request->name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'type' => $request->type,
            'payment' => false,
            'value' => $request->value,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('itens.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Itens $itens)
    {
        if (auth()->id() == $itens->user_id) {
            return view('itens.show', compact('itens'));
        } else {
            return redirect()->route('itens.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itens $itens)
    {
        if (auth()->id() == $itens->user_id) {
            return view('todos.edit', compact('itens'));
        } else {
            return redirect()->route('itens.index')->withError(['msg' => 'You don\'t have permission to edit this item!']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Itens $itens)
    {
        if (auth()->id() == $itens->user_id) {
            $itens->update($request->all());
            return redirect()->route('itens.index');
        } else {
            return redirect()->route('itens.index')->withError(['msg' => 'You don\'t have permission to update this item!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Itens $itens)
    {
        if (auth()->id() == $itens->user_id) {
            $itens->delete();
            return redirect()->route('itens.index');
        } else {
            return redirect()->route('itens.index')->withError(['msg' => 'You don\'t have permission to delete this item!']);
        }
    }
}
