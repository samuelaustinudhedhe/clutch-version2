<?php

namespace App\Models;

use App\Traits\Attachments;
use App\Traits\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRolesAndPermissions;
    use Attachments;


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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

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
    
}
