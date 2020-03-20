<?php

namespace App\Console\Commands\Web;

use App\Models\User;
use App\Models\UserHasContent;
use Illuminate\Console\Command;

class UserStaticDataCalculate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'web:user-static-data-calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '计算用户数据 , 如关注的用户 粉丝 点赞树';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::all()->each(function($item){
            $data['follow_count']       = $item->followUser()->count();
            $data['attention_count']    = $item->attentionUser()->count();
            $data['give_awesome_count'] = $item->awesomeContent()->count();
            $data['awesome_count']      = UserHasContent::whereIn('content_id',$item->contents()->get()->pluck('id'))->count();

            User::where('id', $item->id)->update($data);
        });
    }
}
