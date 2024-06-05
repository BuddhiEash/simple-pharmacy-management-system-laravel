<?php

namespace App\Services;

use App\Contracts\CustomerInterface;
use App\Models\Customer;
use App\Models\Medication;

class CustomerService implements CustomerInterface
{
    private Customer $customer;
    private Medication $medication;

    public function __construct()
    {
        $this->customer = new Customer();
        $this->medication = new Medication();
    }

    public function add(array $data)
    {
        try {
            $this->customer->first_name = $data['first_name'];
            $this->customer->last_name = $data['last_name'];
            $this->customer->nic_number = $data['nic_number'];
            $this->customer->date_of_birth = $data['date_of_birth'];
            $this->customer->save();
            if (array_key_exists('medication_id', $data)) {
                $medication = $this->medication->find($data['medication_id']);
                $this->customer->medication()->attach($medication);
            }
            return $this->customer;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function get(string $id)
    {
        try {
            return $this->customer::find($id)->with('medication')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAll()
    {
        try {
            return $this->customer->with('medication')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(array $data, string $id)
    {
        try {
            $customer = $this->customer::find($id);
            if (array_key_exists('first_name', $data)) {
                $customer->first_name = $data['first_name'];
            }
            if (array_key_exists('last_name', $data)) {
                $customer->last_name = $data['last_name'];
            }
            if (array_key_exists('nic_number', $data)) {
                $customer->nic_number = $data['nic_number'];
            }
            if (array_key_exists('date_of_birth', $data)) {
                $customer->date_of_birth = $data['date_of_birth'];
            }
            $customer->save();
            if (array_key_exists('medication_id', $data)) {
                $medication = $this->medication->find($data['medication_id']);
                $customer->medication()->attach($medication);
            }
            return $customer;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete(string $id)
    {
        try {
            $this->customer::findOrFail($id)->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
