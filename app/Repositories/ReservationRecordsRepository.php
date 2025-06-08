<?php

namespace App\Repositories;

use App\Models\ReservationRecords;

class ReservationRecordsRepository
{
    static function Add($validate)
    {
        ReservationRecords::create([
            'line_id' => $validate['line_id'],
            'appointmentDate_id' => $validate['appointmentDate_id'],
            'appointmentDate' => $validate['appointmentDate'],
            'appointmentTime_id' => $validate['appointmentTime_id'],
            'appointmentTime' => $validate['appointmentTime'],
            'areaPart_id' => $validate['areaPart_id'],
            'areaPart' => $validate['areaPart']
        ]);
    }
}
?>