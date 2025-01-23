<?php

namespace App\Services;

use App\Repositories\PersonalRecordRepository;

class PersonalRecordService
{
    private $repository;

    public function __construct(PersonalRecordRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getRanking($movementId)
    {
        $records = $this->repository->getPersonalRecordsByMovement($movementId);

        $rankings = [];
        $position = 1;
        $lastValue = null;

        foreach ($records as $index => $record) {
            if ($lastValue !== null && $record->recordValue !== $lastValue) {
                $position = $index + 1;
            }

            $rankings[] = [
                'movementName' => $record->movementName,
                'userName' => $record->userName,
                'recordValue' => $record->recordValue,
                'position' => $position,
                'recordDate' => $record->date
            ];

            $lastValue = $record->recordValue;
        }

        return $rankings;
    }
}
