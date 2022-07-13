<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use App\Services\EventViewService;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private EventViewService $eventViewService;
    private EventService $eventService;

    public function __construct(
        EventViewService $eventViewService,
        EventService $eventService
    ) {
        $this->eventViewService = $eventViewService;
        $this->eventService = $eventService;
    }

    public function create(Request $request): RedirectResponse
    {
        $this->eventService->create(
            $request->all(),
            $request->hasFile('image') ? $request->file('image') : null
        );

        return back();
    }

    public function getCreateView() {
        return $this->eventViewService->getCreateView();
    }

    public  function getList(){
        return $this->eventViewService->getListViewByStatus(false);
    }

    public  function getCompletedList() {
        return $this->eventViewService->getListViewByStatus(true);
    }


    public function toggleStatus(int $id) {
        $this->eventService->toggleStatus($id);
    }

    public function delete(int $id) {
        $this->eventService->delete($id);
    }

    public function getById(int $id){
        return $this->eventViewService->getItemViewById($id);
    }

    public function getUpdateView(int $id){
        return $this->eventViewService->getUpdateView($id);
    }

    public function update(Request $request): RedirectResponse
    {
        $this->eventService->update($request->all());

        return back();
    }
}
