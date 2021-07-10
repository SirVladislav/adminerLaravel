<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;


class NoteController extends Controller
{
    //
    public function upload(Request $request)
    {
        $notes = Note::where('user_id', $request->session()->get('user_id'))->get();

        foreach ($notes as $note) {
            if (strlen($note->text) > 50) {
                $note->text = mb_strimwidth($note->text, 0, 50) . "...";
            }
        }
        return view('main')->with('notes', $notes);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:notes|max:255|min:4',
            'text' => 'required|max:10000',
        ]);

        $user_id = $request->session()->get("user_id");

        Note::create([
            'title' => $request['title'],
            'text' => $request['text'],
            'user_id' => $user_id,
        ]);

        return redirect('/main');
    }

    public function loadNote($id, Request $request)
    {
        $note = Note::where("id", $id)->where('user_id', $request->session()->get('user_id'))->first();

        if (!$note) {
            return redirect()->back()->withErrors('Something went wrong');
        }

        return view('edit-note')->with('note', $note);
    }

    public function editNote($id, Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|min:4',
            'text' => 'required|max:10000',
        ]);

        $note = Note::find($id);

        $note->title = $request->title;
        $note->text = $request->text;

        $note->save();

        return redirect('/main'); // for scripts
    }

    public function delete($id)
    {
        Note::where('id', $id)->delete();

        return redirect('/main');
    }

    public function adminpanelLoadNotes($id)
    {
        $users = User::all();

        $notes = Note::where('user_id', $id)->get();

        return view('adminpanel')->with('notes', $notes)->with('users', $users);
    }
}
