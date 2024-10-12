<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Assuming the trait is used in the User model

class CheckOnboardingStatus extends Command
{
 /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onboarding:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and update onboarding status if necessary';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch all users or the specific models using the Onboarding trait
        $users = User::all();

        foreach ($users as $user) {
            $user->checkAndResumeOnboarding();
        }

        return 0;
    }
}
