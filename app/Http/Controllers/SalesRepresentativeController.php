<?php

namespace App\Http\Controllers;

use App\Models\SalesRepresentative;
use App\Http\Requests\StoreSalesRepresentativeRequest;
use App\Http\Requests\UpdateSalesRepresentativeRequest;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesRepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_reps = SalesRepresentative::paginate(10);
        return view('contents.sales-reps.index', compact('sales_reps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = Route::get();
        return view('contents.sales-reps.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalesRepresentativeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        SalesRepresentative::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'joined_date' => $request->joined_date,
            'route_id' => $request->route_id,
            'manager_id' => Auth::user()->id,
            'comments' => $request->comments,
        ]);
        return redirect()->route('sales-reps.index')->with('success', 'Record added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales_rep = SalesRepresentative::where('id',$id)->get();
        $sales_rep->transform(function ($rep) {
            return [
                'id'=>$rep->id,
                'name'=>$rep->name,
                'email'=>$rep->email,
                'telephone'=>$rep->telephone,
                'joined_date'=>$rep->joined_date,
                'route_name'=>$rep->route->name,
                'comments'=>$rep->comments,
            ];
        });
        return response()->json($sales_rep[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesRepresentative  $sales_rep
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesRepresentative $sales_rep)
    {
        $routes = Route::get();
        return view('contents.sales-reps.edit', compact('sales_rep','routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRepresentativeRequest  $request
     * @param  \App\Models\SalesRepresentative  $sales_rep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesRepresentative $sales_rep)
    {
        $sales_rep->update([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'joined_date' => $request->joined_date,
            'route_id' => $request->route_id,
            'comments' => $request->comments,
        ]);
        return redirect()->route('sales-reps.index')->with('success', 'Record updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesRepresentative  $sales_rep
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesRepresentative $sales_rep)
    {
        $sales_rep->delete();
        return redirect()->route('sales-reps.index')->with('success', 'Record deleted successfully !');
    }
}
