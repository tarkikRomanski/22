<?php

namespace App\Services;

use App\Category;
use App\Event;
use App\Type;

class EventViewService {
    private const LIST_VIEW = 'site.event.list';
    private const ITEM_VIEW = 'site.event.set';
    private const CREATE_VIEW = 'site.event.add';

    public function getCreateView() {
        $data = [
            'types' => Type::all(),
            'category' => Category::all()
        ];

        return view(self::CREATE_VIEW, $data);
    }

    public function getListViewByStatus(bool $status) {
        $eventQuery = Event::getUserEvents($status);

        $data = $eventQuery->exists()
            ? ['events' => $eventQuery->get()]
            : [
                'message' => 'List is empty',
                'events' => []
            ];

        return view(self::LIST_VIEW, $data);
    }

    public function getItemViewById(int $id) {
        $event = Event::getUserEvent($id)->first();

        if (!$event) {
            return '<h2>Data does not exist</h2>';
        }

        return view(self::ITEM_VIEW, ['event' => $event]);
    }

    public function getUpdateView(int $id) {
        $event = Event::getUserEvent($id)->first();

        if (!$event) {
            return '<h2>Data does not exist</h2>';
        }

        $data = [
            'types' => Type::all(),
            'category' => Category::all(),
            'event' => $event
        ];

        echo view('site.event.edit', $data);
    }
}
