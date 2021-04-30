<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ViTri;
use App\Models\LoaiTin;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
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
        $vitri=ViTri::all();
        View::share('vitri', $vitri);
        $loaitin=LoaiTin::all();
        View::share('loaitin', $loaitin);
        Paginator::useBootstrap();
    }
}
