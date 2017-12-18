<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\furniture_item;
use App\Models\element_finish;
use Log;

class FurnitureItemsController extends Controller
{

    public function manageItemAjax()
    {
        return view('furniture_items.furniture_items');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $items = furniture_item
            ::join('wooden', 'elements.WoodenID', '=', 'wooden.id')
            ->join('wooden_type', 'wooden.Wooden_typeID', '=', 'wooden_type.id')
            ->leftJoin('element_finish', 'elements.FinishID', '=', 'element_finish.id')
            ->leftJoin('finish', 'element_finish.finishID', '=', 'finish.id')
            ->select(
                'elements.name',
                'elements.quantity',
                'elements.sizeX',
                'elements.sizeY',
                'elements.sizeZ',
                'elements.price',
                'wooden_type.name as wooden_type',
                'wooden.name as wooden_name',
                'element_finish.side as finish_sides',
                'finish.name as finish_name'
            )->get();
        //$items = furniture_item::all();
        Log::info($items->all());
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sides = $request->get('number_of_sides');
        $element_finish = $request->get('Element_finishID');
        if ($sides != 0) {
            $finish_id = element_finish
                ::whereRaw('finishID = ?', $element_finish)
                ->whereRaw('side = ?', $sides)
                ->value('id');
            if ($finish_id == null) {
                element_finish::create([
                    'finishID' => $element_finish,
                    'side' => $sides,
                ]);
                $finish_id = element_finish
                    ::whereRaw('finishID = ?', $element_finish)
                    ->whereRaw('side = ?', $sides)
                    ->value('id');
            }
            $request->request->add(['FinishID' => $finish_id]);
        } else {
            $request->request->add(['FinishID' => null]);
        }

        $request->request->add(['FurnitureID' => 1]);
        Log::info($request->all());
        $create = furniture_item::create($request->all());
        return response()->json($create);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
