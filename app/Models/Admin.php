<?php

namespace App\Models;

use App\Traits\HasAttachments;
use App\Traits\HasDetails;
use App\Traits\HasRolesAndPermissions;
use App\Traits\HasTwoFactorAuthenticatable;
use App\Traits\HasVehicles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use HasTwoFactorAuthenticatable;
    use HasRolesAndPermissions;
    use HasAttachments;
    use HasVehicles;
    use HasDetails;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
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
    protected  $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    const STATUS_ACTIVE = 'active';
    const STATUS_SUSPENDED = 'suspended';
    const STATUS_ONBOARDING = 'onboarding';
    const STATUS_DELETED = 'deleted';
    const STATUS_INACTIVE = 'inactive';


    /**
     * Get the color associated with the user's role.
     *
     * This accessor method returns a color string based on the user's role.
     * The color is used for visual representation of different roles.
     *
     * @return string The color associated with the user's role.
     *                Defaults to 'zinc' if the role does not match any predefined roles.
     */
    public function getRoleColorAttribute()
    {
        return [
            'superadmin' => 'red',
            'administrator' => 'green',
            'moderator' => 'indigo',
            'editor' => 'purple',
            'author' => 'yellow',
        ][$this->role] ?? 'zinc'; // Default to 'gray' if status doesn't match
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
        ][$this->status] ?? 'gray'; // Default to 'gray' if status doesn't match
    }
    
    /**
     * Get the orders associated with the admin.
     *
     * This method retrieves the orders that are related to the admin
     * through a polymorphic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     *         A collection of Order models associated with this admin.
     */
    public function orders()
    {
        return $this->morphMany(Order::class, 'authorable');
    }

    /**
     * Get the trips associated with the user.
     *
     * This function retrieves all trips that are related to the user through a polymorphic relationship.
     * It uses the 'traveler' morph type to allow for different types of entities (like users) to be associated with trips.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany A collection of Trip models associated with this user.
     */
    public function trips()
    {
        return $this->morphMany(Trip::class, 'traveler');
    }
}
