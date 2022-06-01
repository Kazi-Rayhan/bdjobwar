<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserMetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $package = Package::inRandomOrder()->first();
        if($package->infinite_duration){
            $date = null;
        }
        else{
            $date = now()->addDays($package->duration);
        }
        return [
            'id' => now()->format('Y').now()->format('m').now()->format('d').rand(9999,99999),
            'package_id'=> $package->id,
           'is_paid'=> $package->paid,
           'expired_at'=>$date,
           'infinite_duration'=>$package->infinite_duration

        ];
    }
}
