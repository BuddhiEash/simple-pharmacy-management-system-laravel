<?php

namespace App\Http\Controllers;

use App\Contracts\MedicationInterface;
use App\Http\Resources\RecordResource;
use App\Http\Requests\MedicationCreateRequest;
use App\Http\Requests\MedicationUpdateRequest;
use Illuminate\Support\Facades\Gate;
use App\Constants\HttpStatusCodes;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MedicationInterface $medication)
    {
        return new RecordResource(['status' => 'success', 'message' => 'view all medication records', 'data' => $medication->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicationCreateRequest $request, MedicationInterface $medication)
    {
        if (!Gate::allows('create-medication')) {
            return new RecordResource(['status' => 'failed', 'message' => 'unauthorized', 'status_code' => HttpStatusCodes::UNAUTHORIZED]);
        }
        $validated = $request->validated();
        $medication = $medication->add($validated);
        return new RecordResource(['status' => 'success', 'message' => 'a new medication record created', 'data' => $medication]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, MedicationInterface $medication)
    {
        return new RecordResource(['status' => 'success', 'message' => 'view medication record', 'data' => $medication->get($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicationUpdateRequest $request, string $id, MedicationInterface $medication)
    {
        if (!Gate::allows('update-medication')) {
            return new RecordResource(['status' => 'failed', 'message' => 'unauthorized', 'status_code' => HttpStatusCodes::UNAUTHORIZED]);
        }
        $validated = $request->validated();
        $medication = $medication->update($validated, $id);
        return new RecordResource(['status' => 'success', 'message' => 'medication record updated', 'data' => $medication]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, MedicationInterface $medication)
    {
        if (!Gate::allows('delete-medication')) {
            return new RecordResource(['status' => 'failed', 'message' => 'unauthorized', 'status_code' => HttpStatusCodes::UNAUTHORIZED]);
        }
        $medication->delete($id);
        return new RecordResource(['status' => 'success', 'message' => 'medication record deleted']);
    }
}
