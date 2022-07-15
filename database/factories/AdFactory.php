<?php

namespace Database\Factories;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'campaign_id' => $this->faker->randomDigitNotNull,
        'ad_name' => $this->faker->word,
        'ad_media' => $this->faker->randomElement(]),
        'banner_image_url' => $this->faker->text,
        'banner_html_code' => $this->faker->text,
        'status' => $this->faker->randomElement(]),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
