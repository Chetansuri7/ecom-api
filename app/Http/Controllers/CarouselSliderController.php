<?php

namespace App\Http\Controllers;

use App\Models\CarouselSlider;
use Illuminate\Http\Request;

class CarouselSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carouselsliders = Carouselslider::all();
        return view('carouselslider.index', compact('carouselsliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carouselslider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $carouselslider = new Carouselslider();
        $carouselslider->name = $request->input('carouselSliderName');
        $carouselslider->carousel_sliders_slot_number = $request->input('carouselSliderSlotNumber');
        $carouselslider->carousel_sliders_Image = "";
        if($carouselslider->save()){
            $photo = $request->file('carouselSliderImage');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(1, 500000000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $carouselslider = Carouselslider::find($carouselslider->id);
                        $carouselslider->carousel_sliders_Image = url('/') . '/images/' . $fileName;
                        $carouselslider->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'Saved successfully!');
        }
        return redirect()->back()->with('failed', 'Could not save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarouselSlider  $carouselSlider
     * @return \Illuminate\Http\Response
     */
    public function show(CarouselSlider $carouselSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarouselSlider  $carouselSlider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carouselslider = Carouselslider::find($id);
        return view('carouselslider.edit', compact('carouselslider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarouselSlider  $carouselSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carouselslider = CarouselSlider::find($id);
        $carouselslider->name = $request->input('carouselSliderName');
        $carouselslider->carousel_sliders_slot_number = $request->input('carouselSliderSlotNumber');
        $carouselslider->carousel_sliders_Image = "";
        if($carouselslider->save()){
            $photo = $request->file('carouselSliderImage');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(1, 500000000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $carouselslider = Carouselslider::find($carouselslider->id);
                        $carouselslider->carousel_sliders_Image = url('/') . '/images/' . $fileName;
                        $carouselslider->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'Saved successfully!');
        }
        return redirect()->back()->with('failed', 'Could not save!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarouselSlider  $carouselSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    {
        if(CarouselSlider::destroy($id))
        {
            return redirect()->back()->with('deleted',"Deleted Successfully");
        }
        return redirect()->back()->with('deleted-failed',"Could Not Delete");
    }
}






