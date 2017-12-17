<?php
/**
 * Created by PhpStorm.
 * User: Pista
 * Date: 2017.12.17.
 * Time: 0:54
 */


namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\wooden;

class FurnitureItemComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $wooden;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository $users
     * @return void
     */
    public function __construct(wooden $wooden)
    {
        // Dependencies automatically resolved by service container...
        $this->wooden = $wooden;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('wooden', $this->wooden::all());
    }
}