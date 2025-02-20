<?php

namespace Database\Seeders;

use App\Models\Fianace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiananceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new = new Fianace;
        $new->type = "amount";
        $new->value = "150";
        $new->stripe_key = "Lorem Ipsum";
        $new->stripe_secret = "Lorem Ipsum";
        $new->save();
    }
}
