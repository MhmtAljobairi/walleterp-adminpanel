<?php

namespace App\Observers;

use App\Models\Company;
use Laravel\Nova\Nova;

class CompanyObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\Company  $user
     * @return void
     */
    public function created(Company $user)
    {
        error_log('message here.');
        error_log('message here.');
        error_log('message here.');

    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\Company  $user
     * @return void
     */
    public function updated(Company $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\Company  $user
     * @return void
     */
    public function deleted(Company $user)
    {
        //
    }

    /**
     * Handle the User "forceDeleted" event.
     *
     * @param  \App\Models\Company  $user
     * @return void
     */
    public function forceDeleted(Company $user)
    {
        //
    }

}
