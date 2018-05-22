<?php

use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('channel')->insert([
            [
            'name'=>'上海韵达速递（物流）有限公司',
            'email'=>'guopengcheng@yundaex.com',
            'url'=>'http://www.yundaex.com',
            'code'=>'YD',
            'describe'=>'“韵达快递”品牌创立于1999年8月，总部位于中国上海，现已成为集快递、物流、电子商务配送和仓储服务为一体的全国网络型品牌快递企业，服务范围覆盖国内31个省（区、市）及港澳台地区。2013年以来，韵达快递开启了国际化发展步伐，相继与日本、韩国、美国、德国、澳大利亚等国家和地区开展国际快件业务合作，逐步走出国门，为海外消费者提供快递服务。韵达快递为客户提供快递、物流及电子商务等一系列门到门服务，为大客户订制物流解决方案，并形成了到付、贵重物品、同城区域当天件、国内次晨达件、国内次日达件、代收货款等特色服务。韵达快递拥有并且不断提升快递、物流解决方案、空运和运输各方面的专门技能支持和帮助客户完成他们的目标，以成为客户的长远互利的合作伙伴。2月28日，韵达速递宣布与复星集团、中国平安、招商银行、东方富海、云晖投资等金融与投资机构实现在战略与资本上的共同合作。',
            'only_id'=>'1505187019288846',
            'sign_key'=>'bfab6f29d1a797047fecb3413895806f',
            'ip'=>'110.110.110.1',
            'address'=>'上海市青浦区盈港东路6679号',
            'status'=>'0',
                ],[
                'name'=>'斗腕，超力嗨体育',
                'email'=>'gd1sal@d1sal.com',
                'url'=>'http://d1sal.com',
                'code'=>'91110116MA00CAPM96',
                'describe'=>'斗腕，超力嗨体育是专注于腕力运动的体育赛事运营公司,体育运动项目经营（高危险性体育项目除外）；组织文化艺术交流活动（不含演出）；承办展览展示；设计、制作、代理、发布广告；电脑图文设计；摄影服务；企业形象策划；销售体育用品、文化用品；技术开发、咨询、转让、推广；专业承包；工程设计。（企业依法自主选择经营项目，开展经营活动；工程设计以及依法须经批准的项目，经相关部门批准后依批准的内容开展经营活动；不得从事本市产业政策禁止和限制类项目的经营活动。）',
                'only_id'=>'1505187019288846',
                'sign_key'=>'bfab6f29d1a797047fecb3413895806f',
                'ip'=>'110.110.110.1',
                'address'=>'北京市怀柔区迎宾中路36号2层25308室',
                'status'=>'0',
            ]
        ]);
        DB::table('channel_prepare_info')->insert([
           'channel_user_name'=>'王石磊',
           'channel_user_type'=>'01',
           'channel_user_code'=>'410881199406056514',
           'channel_user_phone'=>'15701681524',
           'channel_user_email'=>'wangsl@inschos.com',
           'channel_user_address'=>'北京市东城区夕照寺中街14号',
           'channel_bank_name'=>'中国建设银行',
           'channel_bank_address'=>'北京市东城区',
           'channel_bank_code'=>'621710007000065287892',
           'channel_bank_phone'=>'15701681524',
           'channel_provinces'=>'110000',
           'channel_city'=>'110000',
           'channel_county'=>'110014',
           'courier_state'=>'回龙观东大街',
           'courier_start_time'=>'',
           'channel_back_url'=>'',
           'channel_account_id'=>'',
           'channel_code'=>'',
           'operate_code'=>'',
           'operate_time'=>date('Y-m-d',time()),
           'p_code'=>'',
           'is_insure'=>'',
        ]);
    }
}
