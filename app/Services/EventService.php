<?php

namespace App\Services;

use App\Event;
use Carbon\Carbon;
use Auth;
use DB;

class EventService {
    public function create($input, $file) {
        $preparedData = $this->prepareDataForSave($input);

        if ($file) {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path() . '/img', $fileName);
            $preparedData['data']['image'] = $fileName;
        }

        Event::createNewEvent($preparedData['data'], $preparedData['startDate'], $preparedData['dueDate']);
    }

    public function update($input) {
        $preparedData = $this->prepareDataForSave($input);

        Event::updateEvent(
            $preparedData['data'],
            $preparedData['startDate'],
            $preparedData['dueDate'],
            $input['event']
        );
    }

    public function toggleStatus(int $id) {
        $eventQuery = Event::where([
            ['id', $id],
            ['owner_id', Auth::user()->id]
        ]);

        if (!$eventQuery->exists()) {
            return;
        }

        $eventQuery->update([
            'status'=> DB::raw('status = 0')
        ]);
    }

    public function delete(int $id)
    {
        Event::where([
            ['id', $id],
            ['owner_id', Auth::user()->id]
        ])->delete();
    }

    private function prepareDataForSave($input): array
    {
        $startDate = Carbon::create(
            $input['start_year'],
            $input['start_month'],
            $input['start_day'],
            $input['start_hour'],
            $input['start_minute']
        );

        $dueDate = Carbon::create(
            $input['end_year'],
            $input['end_month'],
            $input['end_day'],
            $input['end_hour'],
            $input['end_minute']
        );

        $data = [
            'category'=>$input['category'],
            'type'=>$input['type'],
            'owner'=>Auth::user()->id,
            'title'=>$input['title'],
            'text'=>$input['text']
        ];

        return [
            'startDate' => $startDate,
            'dueDate' => $dueDate,
            'data' => $data
        ];
    }
}
