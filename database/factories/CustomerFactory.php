<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{

    protected $model= Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname'=>$this-> faker-> firstName(),
            'lastname' => $this-> faker-> lastName(),
             'email'=>$this-> faker ->email(),
            'password'=>bcrypt($this-> faker ->password()),    
            'mobile'=>$this-> faker ->e164phoneNumber(),
            'image'=> $this-> faker -> image()
        ];
    }
}
