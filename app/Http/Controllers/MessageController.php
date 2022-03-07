<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::leftJoin("users", "users.id", "=", "messages.user")->select("messages.id AS messageId", "messages.*", "users.name")->get();
        return view("messages.index", compact("messages"));
    }


    public function create()
    {
        if(!auth()->check()) return redirect("messages");
        return view("messages.create");
    }


    public function store(Request $request)
    {
        if(!auth()->check()) return redirect("messages");
        $validated = $request->validate([
            "title" => "required",
            "content" => "required"
        ]);

        $validated["user"] = $request->user()->id;

        Message::create($validated);

        return redirect()->route("messages.index")->with("alert", "Bericht aangemaakt!");
    }


    public function show($message)
    {
        $message = Message::select("messages.id AS messageId", "messages.*", "users.name")->leftJoin("users", "users.id", "=", "messages.user")->where("messages.id", "=", $message)->first();
        if(!$message) return redirect("messages");

        return view("messages.show", compact("message"));
    }


    public function edit($message)
    {
        if(!auth()->check()) return redirect("messages");
        $message = Message::find($message);
        if(!$message) return redirect("messages");

        return view("messages.edit", compact("message"));
    }


    public function update(Request $request, $message)
    {
        if(!auth()->check()) return redirect("messages");
        $validated = $request->validate([
            "title" => "required",
            "content" => "required"
        ]);
        $message = Message::find($message);
        if(!$message) return redirect("messages");
        $message->update($validated);

        return redirect("messages")->with("alert", "Bericht is aangepast!");
    }


    public function destroy($message)
    {
        if(!auth()->check()) return redirect("messages");
        $message = Message::find($message);
        if(!$message) return redirect("messages");
        $message->delete();

        return redirect("messages")->with("alert", "Bericht verwijdert!");
    }
}
