<?php

namespace Database\Factories;

use App\Models\AdCampaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdCampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdCampaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'campaign_name' => $this->faker->word,
        'start_dt' => $this->faker->word,
        'is_end_on_specific_date' => $this->faker->randomElement(]),
        'end_dt' => $this->faker->word,
        'total_views_allowed' => $this->faker->randomDigitNotNull,
        'total_clicks_allowed' => $this->faker->randomDigitNotNull,
        'minimum_ctr' => $this->faker->randomDigitNotNull,
        'member_level_id' => $this->faker->randomDigitNotNull,
        'network_id' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->randomElement(]),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
