<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Laravel\Fortify\Fortify; // Add the Fortify class import
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash; // Add the Hash class import
use Illuminate\Http\Request; // Add the Request class import
use App\Models\User; // Add the User class import
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //add some code here
        //check user email, password, and allow only type "doctor" login
        Fortify::authenticateUsing(function(Request $request){
            $user = User::where('email', $request->email)->first();
            if($user && Hash::check($request->password, $user->password) && $user->type == 'doctor'){
                return $user;
            }
        });
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}