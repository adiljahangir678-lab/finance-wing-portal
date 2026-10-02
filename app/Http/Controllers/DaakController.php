<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daak;
use Illuminate\Support\Facades\Auth;

class DaakController extends Controller
{
    // Daak View (Form + Saved Records)
    public function index()
    {
        $user = Auth::user();

        // Admin sab dekh sakta hai, branch user sirf apni branch ka data dekhega
        if ($user->role == 'admin') {
            $daaks = Daak::with('user')->latest()->get();
        } else {
            $daaks = Daak::where('branch_name', $user->branch_name)->latest()->get();
        }

        // Updated view path: daak folder ke andar daak.blade.php
        return view('daak.daak', compact('daaks'));
    }

    // Save Logic
    public function store(Request $request)
    {
        $request->validate([
            'received_from' => 'required|string|max:255',
            'category'      => 'required|string|max:255',
            'received_date' => 'required|date',
            'subject'       => 'required|string',
            'status'        =>  'required|string',
            'pdf_file'      => 'required|mimes:pdf|max:10240',
        ]);

        $pdfPath = null;
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $pdfPath = $file->storeAs('daak_files', $filename, 'public');
        }

        Daak::create([
            'user_id'       => Auth::id(),
            'branch_name'   => Auth::user()->branch_name,
            'received_from' => $request->received_from,
            'category'      => $request->category,
            'received_date' => $request->received_date,
            'subject'       => $request->subject,
            'status'        => $request->status ?? 'underprocess',
            'pdf_path'      => $pdfPath,
        ]);

        return redirect()->back()->with('success', 'Daily Daak record successfully save ho gaya hai!');
    }
        
    
    
}