<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Labels;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $tickets = Ticket::with(['category', 'priority', 'labels'])->paginate(10);

        return view('admin.dashboard', compact('tickets'));
    }

    public function create(): View
    {
        $categories = Category::all();
        $priorities = Priority::all();
        $labels = Labels::all();

        return view('tickets.create', compact('categories', 'priorities', 'labels'));
    }


    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required',
            'message' => 'required',
            'category_id' => 'required|exists:categories,id',
            'priority_id' => 'required|exists:priorities,id',
            'labels_id' => 'required|exists:labels,id',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/tickets', $image->hashName());

        Ticket::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'message' => $request->message,
            'category_id' => $request->category_id,
            'priority_id' => $request->priority_id,
            'labels_id' => $request->labels_id,
        ]);

        return redirect()->route('admin.dashboard')->with(['success' => 'Success!']);
    }

    public function show(string $id): View
    {
        $ticket = Ticket::findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }

    public function edit(string $id): View
    {
        $ticket = Ticket::findOrFail($id);
        $categories = Category::all();
        $priorities = Priority::all();
        $labels = Labels::all();

        return view('tickets.edit', compact('ticket', 'categories', 'priorities', 'labels'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required',
            'message' => 'required',
            'category_id' => 'required|exists:categories,id',
            'priority_id' => 'required|exists:priorities,id',
            'labels_id' => 'required|exists:labels,id',
        ]);

        $ticket = Ticket::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/tickets', $image->hashName());

            Storage::delete('public/tickets/'.$ticket->image);

            $ticket->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'message' => $request->message,
                'category_id' => $request->category_id,
                'priority_id' => $request->priority_id,
                'labels_id' => $request->labels_id,
            ]);
        } else {
            $ticket->update([
                'title' => $request->title,
                'message' => $request->message,
                'category_id' => $request->category_id,
                'priority_id' => $request->priority_id,
                'labels_id' => $request->labels_id,
            ]);
        }

        return redirect()->route('admin.dashboard')->with(['success' => 'Success!']);
    }


    public function destroy($id): RedirectResponse
    {
        $ticket = Ticket::findOrFail($id);

        Storage::delete('public/tickets/'. $ticket->image);

        $ticket->delete();

        return redirect()->route('admin.dashboard')->with(['success' => 'Success!']);
    }
}
