<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $messages = Message::latest()->get();

        return view('dashboard.messages.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'guestName' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'guestMessage' => 'required',
        ]);

        $message = new Message();
        $message->guestName = $request->guestName;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->guestMessage = $request->guestMessage;
        $message->isRead = false;

        $message->save();

        return redirect()->back()
                        ->with('success','Message sent, And We will contact you as soon as possible');

    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }

    public function deleteSelected(Request $request) {

        $messageIds = $request->input('messages', []);
        Message::whereIn('id', $messageIds)->delete();
        
        return redirect()->back()->with('success', 'Selected messages deleted successfully.');
    }

    public function setSelectedRead(Request $request) {

        $messageIds = $request->input('messages', []);
        Message::whereIn('id', $messageIds)->update(['isRead' => true]);
        
        return redirect()->back()->with('success', 'Selected messages deleted successfully.');
    }

    public function setSelectedUnRead(Request $request) {

        $messageIds = $request->input('messages', []);
        Message::whereIn('id', $messageIds)->update(['isRead' => false]);
        
        return redirect()->back()->with('success', 'Selected messages deleted successfully.');
    }
}
