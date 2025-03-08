<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;
use Illuminate\Support\Facades\Log;

class JournalController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        Log::info("Fetching journals for user ID: " . $userId);
        $journals = Diary::where('user_id', $userId)->get();

        // Check if the request is from HTMX
        if (request()->header('HX-Request')) {
            return view('journal.partials.table', compact('journals'));
        }
        return view('journal.index', compact('journals'));
    }

    public function create()
    {
        return view('journal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Diary::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        if ($request->header('HX-Request')) {
            $journals = Diary::where('user_id', Auth::id())->get();
            return response()->view('journal.partials.table', compact('journals'))
                ->header('HX-Trigger', 'closeModal'); // Custom event to close modal
        }

        return redirect()->route('journal.index')->with('success', 'Journal entry created successfully.');
    }

    public function show(string $id)
    {
        $journal = Diary::where('user_id', Auth::id())->findOrFail($id);
        return view('journal.show', compact('journal'));
    }

    public function edit(string $id)
    {
        $journal = Diary::where('user_id', Auth::id())->findOrFail($id);
        return view('journal.edit', compact('journal'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $diary = Diary::where('user_id', Auth::id())->findOrFail($id);
        $diary->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if ($request->header('HX-Request')) {
            $journals = Diary::where('user_id', Auth::id())->get();
            return response()->view('journal.partials.table', compact('journals'))
                ->header('HX-Trigger', 'closeModal');
        }

        return redirect()->route('journal.index')->with('success', 'Journal entry updated successfully.');
    }

    public function destroy(string $id)
    {
        $journal = Diary::where('user_id', Auth::id())->findOrFail($id);
        $journal->delete();

        if (request()->header('HX-Request')) {
            $journals = Diary::where('user_id', Auth::id())->get();
            return view('journal.partials.table', compact('journals'));
        }

        return redirect()->route('journal.index')->with('success', 'Journal entry deleted successfully.');
    }
}