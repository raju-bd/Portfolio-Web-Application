<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.contact.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        $contactMessage->markAsRead();

        return view('admin.contact.show', compact('contactMessage'));
    }

    public function archive(ContactMessage $contactMessage)
    {
        $contactMessage->markAsArchived();

        return redirect()->route('admin.contact.index')->with('success', 'Message archived');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Message deleted');
    }

    public function bulkDelete(Request $request)
    {
        ContactMessage::whereIn('id', $request->input('ids', []))->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Messages deleted');
    }
}
