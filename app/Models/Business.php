<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*---============== SANTHOSH =============---*/
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
/*---============== SANTHOSH =============---*/

class Business extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'business_id',
        'business_name',
        'business_description',
        'business_cover_image_url',
        'business_logo_url',
        'business_website_url',
        'business_email',
        'business_phone',
        'business_address',
        'business_country',
        'business_state',
        'business_city',

        /*---============== SANTHOSH =============---*/
        'business_category_id',
        /*---============== SANTHOSH =============---*/

        'status',
    ];

    /*---============== SANTHOSH =============---*/
     /**
     * Save place details to the businesses table
     */
    public function savePlaceDetails(array $placeDetails)
    {
        $userId = User::where('id', Auth::id())->value('user_id');

        return Business::create([
            'user_id' => $userId, // Get authenticated user ID
            'business_id' => Str::uuid()->toString(), // Generate a unique business ID
            'business_name' => $placeDetails['name'] ?? 'Fetched Business using Google places API',
            'business_website_url' => $placeDetails['website'] ?? null,
            'business_phone' => $placeDetails['international_phone_number'] ?? 'Fetched Business data using Google places API',
            'business_address' => $placeDetails['formatted_address'] ?? 'Fetched Business using Google places API',
            'business_country' => $placeDetails['country'] ?? 'Fetched Business using Google places API',
            'business_state' => $placeDetails['administrative_area_level_1'] ?? 'Fetched Business using Google places API',
            'business_city' => $placeDetails['administrative_area_level_3'] ?? 'Fetched Business using Google places API',
            'business_email' => $placeDetails['email'] ?? 'Fetched Business using Google places API',
            'business_category_id' => $placeDetails['category_id'] ?? '1', // Set a valid category
            'status' => 1,
        ]);

    }
    /*---============== SANTHOSH =============---*/

}
