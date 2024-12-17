<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;
class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::all();
        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|max:255',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',

        ]);
        Issue::create($request->all());
        return redirect()->route('issues.index')->with('success', 'van de dc them');    
    }

    // public function show($id)
    // {
    //     $issue = Issue::find($id);
    //     return view('issues.show', compact('issue'));
    // }

    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'van de co ma: ' . $issue->id . 'da duoc xoa thanh cong!');
    }


    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact ('issue','computers'));

    }

    public function update(Request $request,  $id)
    {
        $request -> validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|max:255',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',

        ]);


        $issue = Issue::find($id);
        $issue -> update($request -> all());
        return redirect()-> route('issues.index') -> with('success', 'van de da duoc cap nhat');


    }
}
