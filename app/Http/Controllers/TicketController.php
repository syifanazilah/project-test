<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Labels;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::with(['category', 'priority', 'labels'])->paginate(10);

        return view('dashboard', compact('tickets'));
    }


    public function show(string $id): View
    {
        $ticket = Ticket::findOrFail($id);

        return view('tickets.show', compact('ticket'));
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

        return redirect()->route('dashboard')->with(['success' => 'Ticket created successfully!']);
    }
}
