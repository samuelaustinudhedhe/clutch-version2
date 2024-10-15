<?php

namespace App\Traits;

use App\Models\TwoFactor;
use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;
use Laravel\Fortify\Events\RecoveryCodeReplaced;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\RecoveryCode;


trait HasTwoFactorAuthenticatable
{
    /**
     * Determine if two-factor authentication has been enabled.
     *
     * @return bool
     */
    public function hasEnabledTwoFactorAuthentication()
    {
        if (Fortify::confirmsTwoFactorAuthentication()) {
            return ! is_null($this->twoFactor->secret) &&
                ! is_null($this->twoFactor->confirmed_at);
        }

        return ! is_null($this->twoFactor->secret);
    }

    /**
     * Get the user's two factor authentication recovery codes.
     *
     * @return array
     */
    public function recoveryCodes()
    {
        return json_decode(decrypt($this->twoFactor->recovery_codes), true);
    }

    /**
     * Replace the given recovery code with a new one in the user's stored codes.
     *
     * @param  string  $code
     * @return void
     */
    public function replaceRecoveryCode($code)
    {
        $this->forceFill([
            'twoFactor->recovery_codes' => encrypt(str_replace(
                $code,
                RecoveryCode::generate(),
                decrypt($this->twoFactor->recovery_codes)
            )),
        ])->save();

        RecoveryCodeReplaced::dispatch($this, $code);
    }

    /**
     * Get the QR code SVG of the user's two factor authentication QR code URL.
     *
     * @return string
     */
    public function twoFactorQrCodeSvg()
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(192, 0, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd
            )
        ))->writeString($this->twoFactorQrCodeUrl());

        return trim(substr($svg, strpos($svg, "\n") + 1));
    }

    /**
     * Get the two factor authentication QR code URL.
     *
     * @return string
     */
    public function twoFactorQrCodeUrl()
    {
        return app(TwoFactorAuthenticationProvider::class)->qrCodeUrl(
            config('app.name'),
            $this->{Fortify::username()},
            decrypt($this->twoFactor->secret)
        );
    }

    /**
     * Get the two-factor authentication record associated with the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function twoFactor()
    {
        return $this->morphOne(TwoFactor::class, 'authenticatable');
    }
}
