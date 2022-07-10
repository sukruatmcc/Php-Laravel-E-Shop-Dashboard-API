<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratingRecords = [
            [
            'id' => 1,
            'user_id' =>1,
            'product_id' =>1,
            'rating' => 4,
            'review' => 'Very good product',
            'status' => 0],
            [
                'id' => 2,
                'user_id' =>1,
                'product_id' =>1,
                'rating' => 5,
                'review' => 'Excellent product',
                'status' => 0],
            [
                'id' => 3,
                'user_id' =>1,
                'product_id' =>1,
                'rating' => 1,
                'review' => 'product is not good not all product',
                'status' => 0],
        ];
        Review::insert($ratingRecords);
    }
}
