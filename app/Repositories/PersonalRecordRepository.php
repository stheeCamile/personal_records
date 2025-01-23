<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\PersonalRecord;


class PersonalRecordRepository
{
    public function getPersonalRecordsByMovement($movementId)
    {
        return DB::table('personal_records as pr')
            ->join('users as u', 'pr.user_id', '=', 'u.id')
            ->join('movements as m', 'pr.movement_id', '=', 'm.id')
            ->select(
                'u.name as userName',
                DB::raw('MAX(pr.value) as recordValue'),
                'pr.date',
                'm.name as movementName'
            )
            ->where('pr.movement_id', $movementId)
            ->groupBy('u.id', 'u.name', 'pr.date', 'm.name')
            ->orderBy('recordValue', 'desc')
            ->get();
    }

    /**
     *
     * @param  array  $data
     * @return \App\Models\PersonalRecord
     */
    public function create(array $data)
    {
        return PersonalRecord::create([
            'user_id' => $data['user_id'],
            'movement_id' => $data['movement_id'],
            'value' => $data['recordValue'],
            'date' => $data['recordDate'],
        ]);
    }
}
