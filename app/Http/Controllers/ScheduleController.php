<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan = Paket::where('id_user', Auth::id())->whereRaw('( status = "active" OR status_pembayaran = "pending" )')->orderBy('id', 'desc')->first();
        $socialMedia = null;
        $message = "Anda belum membeli plan untuk sosial media";
        if($plan){
            if($plan->status_pembayaran == 'pending'){
                $message = "Anda belum menyelesaikan pembayaran";
                return view('dashboard.schedule', compact('socialMedia', 'message'));
            }
            switch(strtolower($plan->paket)){
                case 'bundle premium':
                    $socialMedia = $plan;
                    break;
                case 'bundle gold':
                    $socialMedia = $plan;
                    break;
                case 'bundle regular':
                    $socialMedia = $plan;
                    break;
                case 'social media premium':
                    $socialMedia = $plan;
                    break;
                case 'social media gold':
                    $socialMedia = $plan;
                    break;
                case 'social media regular':
                    $socialMedia = $plan;
                    break;
            }
        }
        return view('dashboard.schedule', compact('socialMedia', 'message'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin($id)
    {
        $schedules = Schedule::where('id_pemilik', $id)->get();

        return view('admin.schedule', compact('schedules'));
        
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allData = Schedule::where('id_pemilik', Auth::id())->get();
        $data = Schedule::findOrFail($id);
        $diff = date_diff(date_create($data->start),date_create($data->end));
        $i = $data->id;
        if($diff->format("%a") == "1"){
            $data->tanggal = Carbon::parse($data->start)->format("d-m-Y");
        }else{
            $data->tanggal = Carbon::parse($data->start)->format("d-m-Y") . " - " . Carbon::parse($data->end)->format("d-m-Y");
        }
        while($i !=0 ){
            $i--;
            @$data->prev_page = Schedule::where('id', $i)->where('id_pemilik', Auth::id())->first()->id;
        }
        $i = $data->id;
        $lastId = Schedule::orderBy('id','desc')->first()->id;
        while($i <= $lastId){
            $i++;
            @$data->next_page = Schedule::where('id', $i)->where('id_pemilik', Auth::id())->first()->id;
        }
        return view('schedule_detail', compact('data','allData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = Schedule::create([
            "title" => $request->title,
            "start" => $request->start,
            "id_pemilik" => $request->pemilik,
            "end" => $request->end,
            "allDay" => $request->allDay
        ]);

        return response(["message"=>$status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $user = User::find($schedule->id_pemilik);
        $diff = date_diff(date_create($schedule->start),date_create($schedule->end));
        $i = $schedule->id;
        if($diff->format("%a") == "1"){
            $schedule->tanggal = Carbon::parse($schedule->start)->format("d-m-Y");
        }else{
            $schedule->tanggal = Carbon::parse($schedule->start)->format("d-m-Y") . " s.d " . Carbon::parse($schedule->end)->format("d-m-Y");
        }
        return view('admin.post', compact('schedule','user'));
    }

    public function getData($id){
        $user = User::find($id);
        $data = Schedule::where('id_pemilik', $id)->get('*');
        return response()->json(['data' => $data, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->hasFile('gambar')){
            $request->validate([
              'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('gambar')->store('public/images');
            $request->gambar = $path;
            $status = Schedule::findOrFail($request->id)->update(['gambar' => $request->gambar]);
        }
        $status = Schedule::find($request->id)->update(['title'=>$request->title,'start'=>$request->start,'end'=>$request->end]);
        if($request->page == 'edit page'){
            $status = Schedule::find($request->id)->update(['title'=>$request->title,'start'=>$request->start,'end'=>$request->end,'deskripsi'=>$request->description]);
            return redirect('schedule/edit/' . $request->id)->with('success',"Data berhasi diubah!");
        }else{
            $status = Schedule::find($request->id)->update(['title'=>$request->title,'start'=>$request->start,'end'=>$request->end]);
            return response(['message'=>$status]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $status = Schedule::destroy($request->id);
        return response(['message'=>$status]);
    }
}
