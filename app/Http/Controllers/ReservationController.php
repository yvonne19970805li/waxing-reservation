<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReservationRepository;
use App\Models\AppointmentDate;
use App\Models\AppointmentTime;
use App\Models\AreaPart;
use App\Models\Activity;
use App\Models\reservation;
use App\Models\Line_id;
use GuzzleHttp\Promise\Create;

class ReservationController extends Controller
{
    /**
     * 將資料傳送到view
     */
    public function ReservationShow()
    {
        $AppointmnetDate = AppointmentDate::All();
        $AppointmentTime = AppointmentTime::All();
        $AreaPart = AreaPart::ALL();
        $Activity = Activity::ALL();

        return view('reservation', compact('AppointmnetDate', 'AppointmentTime', 'AreaPart', 'Acitivity'));
    }

    /**
     * 這邊接收傳送過來的資料
     */
    public function Store(Request $request)
    {
        $validate = $request->validate([
            'appointmentDate_id' => 'required',
            'appointmentDate' => 'required',
            'appointmentTime_id' => 'required',
            'appointmentTime' => 'required',
            'areaPart_id' => 'required',
            'areaPart' => 'required|array',
        ]);
        // 把多選的id存成字串
        $validate['areaPart_id'] = implode(',', $validate['areaPart_id']); 
        $validate['areaPart'] = implode(',' , $validate['areaPart']);

        $validate['line_id'] = session('line_id');

        $datas = ReservationRepository::Add($validate);

        //預約成功後跳轉
        return redirect('/reservation/complete')->with([
            'success' => '預約成功！',
            'datas' => $datas
        ]);
        

        //
    }
}
