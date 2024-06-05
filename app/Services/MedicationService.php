<?php

namespace App\Services;

use App\Contracts\MedicationInterface;
use App\Models\Medication;

class MedicationService implements MedicationInterface
{
    private Medication $medication;

    public function __construct()
    {
        $this->medication = new Medication();
    }

    public function add(array $data)
    {
        try {
            $this->medication->name = $data['name'];
            $this->medication->description = $data['description'];
            $this->medication->quantity = $data['quantity'];
            $this->medication->price = $data['price'];
            $this->medication->save();
            return $this->medication;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function get(string $id)
    {
        try {
            return $this->medication::find($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAll()
    {
        try {
            return $this->medication::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(array $data, string $id)
    {
        try {
            $medication = $this->medication::find($id);
            if (array_key_exists('name', $data)) {
                $medication->name = $data['name'];
            }
            if (array_key_exists('description', $data)) {
                $medication->description = $data['description'];
            }
            if (array_key_exists('quantity', $data)) {
                $medication->quantity = $data['quantity'];
            }
            if (array_key_exists('price', $data)) {
                $medication->price = $data['price'];
            }
            $medication->save();
            return $medication;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete(string $id)
    {
        try {
            $this->medication::findOrFail($id)->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
