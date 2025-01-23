<?php

namespace App\Http\Controllers;


use App\Services\PersonalRecordService;
use App\Models\Movement;
use App\Http\Requests\StorePersonalRecordRequest;
use App\Repositories\PersonalRecordRepository;
use App\Models\User;


class PersonalRecordController extends Controller
{
    private $service;
    protected $personalRecordRepository;

    public function __construct(PersonalRecordService $service, PersonalRecordRepository $personalRecordRepository)
    {
        $this->service = $service;
        $this->personalRecordRepository = $personalRecordRepository;

    }

    public function index()
    {
        $movements = Movement::all(); 
        return view('personal_records.index', compact('movements'));
    }
    public function indexRanking()
    {
        $movements = Movement::all(); 
        return view('ranking.index', compact('movements'));
    }

    public function getRanking($movementId)
    {
        $ranking = $this->service->getRanking($movementId);
        return response()->json($ranking);
    }
     /**

     * Store personal record in database. 
     * @param  \App\Http\Requests\StorePersonalRecordRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePersonalRecordRequest $request)
    {
        $data = $request->validated();

        $userId = User::where('name', $data['userName'])->first()->id;

        $personalRecordData = [
            'user_id' => $userId,
            'movement_id' => $data['movement_id'],
            'recordValue' => $data['recordValue'],
            'recordDate' => $data['recordDate'],
        ];

        $this->personalRecordRepository->create($personalRecordData);

        return redirect()->route('moviments.index')
        ->with('success', 'Recorde pessoal cadastrado com sucesso!');
}
}
