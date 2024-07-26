<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{

    public function create()
    {
        $cars = Car::all();
        // dd($cars);
        return view('consumers.create', compact('cars'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consumers = Consumer::with('car')->get();
        return view('consumers.index', compact('consumers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $consumer = $request->user()->consumer;
      $request->validate([
        'car' => 'required',
        'ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'spk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'down_payment_receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      if ($request->hasFile('ktp')) {
          $ktpPath = $request->file('ktp')->store('uploads/ktp', 'public');
          $consumer->ktp = $ktpPath;
      }

      if ($request->hasFile('spk')) {
          $spkPath = $request->file('spk')->store('uploads/spk', 'public');
          $consumer->spk = $spkPath;
      }

      if ($request->hasFile('down_payment_receipt')) {
          $downPaymentReceiptPath = $request->file('down_payment_receipt')->store('uploads/down_payment_receipt', 'public');
          $consumer->down_payment = $downPaymentReceiptPath;
      }

      $consumer->car_id = $request->car;

      $consumer->save();

      return redirect()->route('consumers.index')->with('success', 'Data konsumen dikirim ke sales.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Consumer $consumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consumer $consumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consumer $consumer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consumer $consumer)
    {
        //
    }
}
