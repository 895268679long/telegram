<?php

namespace app\api\controller;

use app\admin\model\Member;
use app\common\controller\Api;
use think\Cache;
use think\Request;
use think\Log;
/**
 * 首页接口
 */
class Index extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 首页
     *
     */
    public function index(Request $request)
    {
        $text = "热门排行榜：
";


        // 使用正则表达式匹配
        preg_match_all('/📢\s+([\x{4e00}-\x{9fa5}]+.*?)\s+\(https:\/\/t\.me\/(.*?)\)/u', $text, $matches, PREG_SET_ORDER);

// 输出匹配结果
        echo count($matches);
        foreach ($matches as $match) {
            $channel_name = $match[1];
            $channel_link = "https://t.me/" . $match[2];
            echo "\"$channel_link\",<br />";
        }

    }

    public function getgemsNew () {
        $address = "EQCZ6_oVjnrTKodmJbqd4DQSSm1JH2QL0z_1_gmjZcLEf7rp";
        $cursor = 0;
        $curl = curl_init();


        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.getgems.io/graphql?operationName=nftSearch&variables=%7B%22query%22%3A%22%7B%5C%22%24and%5C%22%3A%5B%7B%5C%22actualOwnerAddress%5C%22%3A%5C%22EQBrGhnY9ZwwsLfUvxskHehVp5RHHX7_El12U4xm5Zxfvdc7%5C%22%7D%2C%7B%5C%22isBlocked%5C%22%3Afalse%7D%2C%7B%5C%22isHiddenByUser%5C%22%3Afalse%7D%2C%7B%5C%22collectionAddressList%5C%22%3A%5B%5C%22EQCA14o1-VWhS2efqoh_9M1b_A9DtKTuoqfmkn83AbJzwnPi%5C%22%5D%7D%5D%7D%22%2C%22sort%22%3A%22%5B%7B%5C%22lastChangeOwnerAt%5C%22%3A%7B%5C%22order%5C%22%3A%5C%22desc%5C%22%7D%7D%5D%22%2C%22count%22%3A30%2C%22cursor%22%3A%2260%22%7D&extensions=%7B%22persistedQuery%22%3A%7B%22version%22%3A1%2C%22sha256Hash%22%3A%22566aab5b51f3a22f10b7ae0acbed38d14f7466f042a8dcbf98b260ba6c52bd33%22%7D%7D',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json; charset=utf-8',
                'Referer: https://getgems.io/',
                'Origin: https://getgems.io',
                'Content-Type: application/json'


            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $this->success($response);
        $response = json_decode($response,1);


    }
}
