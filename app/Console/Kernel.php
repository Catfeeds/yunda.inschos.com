<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\YunDaPrepare::class,
        Commands\Msg::class,
        Commands\YundaCallback::class,
        Commands\Test::class,
        Commands\YunDaPay::class,
        Commands\YunDaIssue::class,
        Commands\YunDaPre::class,
        Commands\YdWechatPre::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
		$schedule->command('yunda_wechat_prepare')->everyMinute()->between('00:00',  '23:59')->runInBackground();
		$schedule->command('yunda_pay')->hourly()->between('00:00',  '23:59')->runInBackground();
//		  $schedule->command('yunda_pre')->everyMinute()->runInBackground();
//        $schedule->command('yunda_issue')->hourly()->between('01:00',  '23:00')->runInBackground();
//        $schedule->command('yd_issue')->everyMinute()->between('22:00',  '05:00')->runInBackground();
										
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }

}

//todo 调度常用选项
//->cron('* * * * *');	在自定义Cron调度上运行任务
//->everyMinute();	每分钟运行一次任务
//->everyFiveMinutes();	每五分钟运行一次任务
//->everyTenMinutes();	每十分钟运行一次任务
//->everyThirtyMinutes();	每三十分钟运行一次任务
//->hourly();	每小时运行一次任务
//->daily();	每天凌晨零点运行任务
//->dailyAt('13:00');	每天13:00运行任务
//->twiceDaily(1, 13);	每天1:00 & 13:00运行任务
//->weekly();	每周运行一次任务
//->monthly();	每月运行一次任务
//->monthlyOn(4, '15:00');	每月4号15:00运行一次任务
//->quarterly();	每个季度运行一次
//->yearly();	每年运行一次
//->timezone('Asia/Shanghai');	设置时区Asia/Shanghai
