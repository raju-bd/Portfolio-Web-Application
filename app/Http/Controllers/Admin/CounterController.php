<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index()
    {
        $counters = Counter::all();

        return view('admin.counters.index', compact('counters'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'companies' => 'nullable|integer|min:0',
            'modules' => 'nullable|integer|min:0',
            'domains' => 'nullable|integer|min:0',
            'projects' => 'nullable|integer|min:0',
            'clients' => 'nullable|integer|min:0',
        ]);

        foreach ($validated as $type => $count) {
            if ($count !== null) {
                Counter::updateOrCreate(
                    ['type' => $type],
                    ['count' => $count, 'label' => ucfirst($type)]
                );
            }
        }

        return redirect()->route('admin.counters.index')->with('success', 'Counters updated successfully');
    }
}
