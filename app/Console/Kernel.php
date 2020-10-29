<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Vacante;
use App\User;
use App\Rol;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $now = Carbon::now();

            $vacantes = Vacante::
            with('postulaciones')
            ->with('materia')
            ->with('postulaciones.usuario')
            ->whereNull('fecha_cierre')
            ->whereDate('fecha_cierre_estipulada', '<=', $now->toDateString());

            $users = User::where('id_rol', Rol::$RESPONSABLE_ADMINISTRATIVO)
            ->pluck('email');

            Mail::to(env('MAIL_USERNAME'))
            ->bcc($users)
            ->send(new \App\Mail\CierreVacanteMail($now, $vacantes->get()));

            $vacantes
            ->update(['fecha_cierre' => $now]);
        })->dailyAt('12:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
