<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InCome;

class IncomeController extends Controller
{
    /**
     * Display a listing of theresource.
     */
    public function index()
    {
        $in_come = InCome::select('date', 'price', 'id')->get();
        return view('main.income', compact('in_come'));    
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
        $validated = $request->validate([
            'date' => 'required|date',
            'price' => 'required|numeric',
        ]);

        $result = InCome::create([
            'date' => $request->date,
            'price' => $request->price,
        ]);

        if (!empty($result)){
            session()->flash('flash_message', '収入を登録しました。');
        } else {
            session()->flash('flash_error_message', '収入を登録できませんでした。');
        }

        return redirect('/income');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $in_come = InCome::find($id);
        return view('main.income_edit', compact('in_come'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'price' => 'required|numeric',
        ]);

        $hasDate = InCome::where('id', '=', $request->id);
        if ($hasDate->exists()) {
            $hasDate->update([
            'date' => $request->date,
            'price' => $request->price
        ]);
            session()->flash('flash_message', '収入を更新しました。');
        } else {
            session()->flash('flash_error_message', '収入を更新できませんでした。');
        }

        return redirect('/income');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ic_come = InCome::find($id);
        $ic_come->delete();
        session()->flash('flash_message', '支出を削除しました。');
        return redirect('/income');
    }
}
