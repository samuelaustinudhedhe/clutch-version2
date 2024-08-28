<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasAttachments;
use App\Traits\HasDetails;
use App\Traits\HasRolesAndPermissions;
use App\Traits\HasVehicles;
use App\Traits\Onboarding;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use HasDetails;
    use TwoFactorAuthenticatable;
    use HasRolesAndPermissions;
    use HasAttachments;
    use Onboarding;
    use HasVehicles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'status',
        'rating',
        'details',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'details' => 'object',
        'boarding' => 'object',
        'verification' => 'object',
    ];

    /**
     * Get the color associated with the user's role.
     *
     * This accessor method returns a color string based on the user's role.
     * It maps specific roles to their corresponding colors and defaults to 'zinc'
     * if the role does not match any predefined roles.
     *
     * @return string The color associated with the user's role.
     */
    public function getRoleColorAttribute()
    {
        return [
            'owner' => 'blue',
            'driver' => 'indigo',
            'host' => 'sky',
        ][$this->role] ?? 'zinc'; // Default to 'zinc' if role doesn't match
    }

    /**
     * Get the color associated with the user's status.
     *
     * This accessor method returns a color string based on the user's status.
     * The color is used for visual representation of different statuses.
     *
     * @return string The color associated with the user's status.
     *                Defaults to 'gray' if the status does not match any predefined statuses.
     */
    public function getStatusColorAttribute()
    {
        return [
            'active' => 'green',
            'suspended' => 'red',
            'onboarding' => 'teal',
            'deleted' => 'red',
        ][$this->status] ?? 'gray'; // Default to 'gray' if status doesn't match
    }

    /**
     * Get the social media logos associated with the user's social links.
     *
     * This accessor method returns an array of social media platform logos based on the user's social links.
     * It constructs the logo file paths for each social media platform the user has provided a link for.
     *
     * @return array<string, string> An associative array where the keys are social media platform names
     *                               and the values are the paths to their corresponding logo images.
     */
    public function getSocialLogoAttribute()
    {
        $socialLogos = [];
        $socialLinks = $this->getDetails()->social;

        if ($socialLinks) {
            foreach ($socialLinks as $platform => $link) {
                $socialLogos[$platform] = "assets/images/logos/{$platform}.svg";
            }
        }

        return $socialLogos;
    }
}
