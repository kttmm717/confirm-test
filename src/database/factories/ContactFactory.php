<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $prefecture = $faker->prefecture();
        $city = $faker->city();
        $town = $faker->streetName();
        $address =  $prefecture.$city.$town;

        return [
            'category_id' => $this->faker->numberBetween(1,5),
            'first_name' => $this->faker->lastName(),
            'last_name' => $this->faker->firstName(),
            'gender' => $this->faker->numberBetween(0,2),
            'email' => $this->faker->safeEmail(),
            'tel' => $this->faker->phoneNumber(),
            'address' => $address,
            'building' => $this->faker->secondaryAddress,
            'detail' => $this->faker->realText(30)
        ];
    }
}
