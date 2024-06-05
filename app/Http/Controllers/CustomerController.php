<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\HttpStatusCodes;
use App\Contracts\CustomerInterface;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\RecordResource;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CustomerInterface $customer)
    {
        return new RecordResource(['status' => 'success', 'message' => 'view all customer records', 'data' => $customer->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerCreateRequest $request, CustomerInterface $customer)
    {
        if (!Gate::allows('create-customer')) {
            return new RecordResource(['status' => 'failed', 'message' => 'unauthorized', 'status_code' => HttpStatusCodes::UNAUTHORIZED]);
        }
        $validated = $request->validated();
        $customer = $customer->add($validated);
        return new RecordResource(['status' => 'success', 'message' => 'a new customer record created', 'data' => $customer]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, CustomerInterface $customer)
    {
        return new RecordResource(['status' => 'success', 'message' => 'view customer record', 'data' => $customer->get($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, string $id, CustomerInterface $customer)
    {
        if (!Gate::allows('update-customer')) {
            return new RecordResource(['status' => 'failed', 'message' => 'unauthorized', 'status_code' => HttpStatusCodes::UNAUTHORIZED]);
        }
        $validated = $request->validated();
        $medication = $customer->update($validated, $id);
        return new RecordResource(['status' => 'success', 'message' => 'customer record updated', 'data' => $medication]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, CustomerInterface $customer)
    {
        if (!Gate::allows('delete-customer')) {
            return new RecordResource(['status' => 'failed', 'message' => 'unauthorized', 'status_code' => HttpStatusCodes::UNAUTHORIZED]);
        }
        $customer->delete($id);
        return new RecordResource(['status' => 'success', 'message' => 'customer record deleted']);
    }
}
