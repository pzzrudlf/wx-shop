<?php


namespace app\api\controller\v1;


use app\api\controller\BaseController;

class Demo extends BaseController
{
    protected $data = null;

    public function _initialize()
    {
        $this->data = config('data');
    }

    public function getBannerByID()
    {
        return $this->data['banner'][0];
    }

    public function getBannerByName()
    {
        return $this->data['banner'][0];
    }

    public function getThemesByName()
    {
        return $this->data['theme']['list'];
    }

    public function getThemeWithSpuByName()
    {
        return $this->data['theme']['one'];
    }

    public function getActivityByName()
    {
        return $this->data['activity'][0];
    }

    public function getActivityByNameWithSpu()
    {
        return $this->data['activity'][1];
    }

    public function getCouponsByCategoryID()
    {
        return $this->data['coupon'];
    }

    /**
     * @return null
     */
    public function getCouponsInWholeStore()
    {
        return $this->data['coupon'];
    }

    /**
     * @return null
     */
    public function getMyselfCouponByStatus()
    {
        $str = '    {
        "id":4,
        "title":"满500减100券",
        "start_time":1564956702000,
        "end_time":1564956708000,
        "description":null,
        "full_money":500,
        "minus":101,
        "rate":null,
        "type":1,
        "remark":"限服装、鞋、文具等商品",
        "whole_store":false
    }';
        return [
            json_decode($str, true)
        ];
    }

    public function getCouponAvailableWithCategory()
    {
        $str = '    {
        "id":4,
        "title":"满500减100券",
        "start_time":1564956702000,
        "end_time":1564956708000,
        "description":null,
        "full_money":500,
        "minus":101,
        "rate":null,
        "type":1,
        "remark":"限服装、鞋、文具等商品",
        "whole_store":false
    }';
        return [
            json_decode($str, true)
        ];
    }

    public function getCouponCollect($id)
    {
        $str = '{"error_code": "0","msg": "ok","url": "/v1/coupon/collect/3"}';
        return json_decode($str, true);
    }

    public function getAllCategory()
    {
        $str = '{"roots":[{"id":37,"name":"测试数据","is_root":true,"img":null,"parent_id":null,"index":null},{"id":3,"name":"包包","is_root":true,"img":null,"parent_id":null,"index":1}],"subs":[{"id":6,"name":"平底鞋","is_root":false,"img":"","parent_id":1,"index":null},{"id":7,"name":"凉鞋","is_root":false,"img":null,"parent_id":1,"index":null}]}';
        return json_decode($str, true);
    }

    public function getAllGrid()
    {
        return $this->data['category'];
    }

    public function getFixedSaleExplain()
    {
        $str = '[{"id":1,"fixed":true,"text":"发货地：上海","spu_id":null,"index":1,"replace_id":null},{"id":2,"fixed":true,"text":"物流：顺丰","spu_id":null,"index":2,"replace_id":null}]';
        return json_decode($str, true);
    }

    public function getSearch()
    {
        $str = '{
    "total":1,
    "count":10,
    "page":0,
    "total_page":1,
    "items":[
        {
            "id":8,
            "title":"ins复古翠绿NoteBook",
            "subtitle":"林白默默的掏出小本本，将她说的话一次不漏的记了下来。",
            "img":"",
            "for_theme_img":"",
            "price":"29.99",
            "discount_price":"27.8",
            "description":null,
            "tags":"林白推荐",
            "sketch_spec_id":"1",
            "max_purchase_quantity":null,
            "min_purchase_quantity":null
        }
    ]
}';
        return json_decode($str, true);
    }

    public function getTagByType()
    {
        $str = '[
    {
        "id":1,
        "title":"Sleeve",
        "highlight":1,
        "description":null,
        "type":1
    },
    {
        "id":3,
        "title":"林白",
        "highlight":0,
        "description":null,
        "type":1
    }
]';
        return json_decode($str, true);
    }

    public function getSpuProductByID()
    {
        $str = '{
    "id":2,
    "title":"林间有风自营针织衫",
    "subtitle":"瓜瓜设计，3件包邮",
    "category_id":12,
    "root_category_id":2,
    "price":"77.00",
    "img":"",
    "for_theme_img":"",
    "description":null,
    "discount_price":"62.00",
    "tags":"包邮$热门",
    "is_test":true,
    "online":true,
    "sku_list":[
        {
            "id":2,
            "price":77.76,
            "discount_price":null,
            "online":true,
            "img":"",
            "title":"金属灰·七龙珠",
            "spu_id":2,
            "category_id":17,
            "root_category_id":3,
            "specs":[
                {
                    "key_id":1,
                    "key":"颜色",
                    "value_id":45,
                    "value":"金属灰"
                },
                {
                    "key_id":3,
                    "key":"图案",
                    "value_id":9,
                    "value":"七龙珠"
                },
                {
                    "key_id":4,
                    "key":"尺码",
                    "value_id":14,
                    "value":"小号 S"
                }
            ],
            "code":"2$1-45#3-9#4-14",
            "stock":5
        },
        {
            "id":3,
            "price":66,
            "discount_price":59,
            "online":true,
            "img":"",
            "title":"青芒色·灌篮高手",
            "spu_id":2,
            "category_id":17,
            "root_category_id":3,
            "specs":[
                {
                    "key_id":1,
                    "key":"颜色",
                    "value_id":42,
                    "value":"青芒色"
                },
                {
                    "key_id":3,
                    "key":"图案",
                    "value_id":10,
                    "value":"灌篮高手"
                },
                {
                    "key_id":4,
                    "key":"尺码",
                    "value_id":15,
                    "value":"中号 M"
                }
            ],
            "code":"2$1-42#3-10#4-15",
            "stock":999
        },
        {
            "id":4,
            "price":88,
            "discount_price":null,
            "online":true,
            "img":"",
            "title":"青芒色·圣斗士",
            "spu_id":2,
            "category_id":17,
            "root_category_id":3,
            "specs":[
                {
                    "key_id":1,
                    "key":"颜色",
                    "value_id":42,
                    "value":"青芒色"
                },
                {
                    "key_id":3,
                    "key":"图案",
                    "value_id":11,
                    "value":"圣斗士"
                },
                {
                    "key_id":4,
                    "key":"尺码",
                    "value_id":16,
                    "value":"大号  L"
                }
            ],
            "code":"2$1-42#3-11#4-16",
            "stock":8
        },
        {
            "id":5,
            "price":77,
            "discount_price":59,
            "online":true,
            "img":"http://i1.sleeve.7yue.pro/assets/09f32ac8-1af4-4424-b221-44b10bd0986e.png",
            "title":"橘黄色·七龙珠",
            "spu_id":2,
            "category_id":17,
            "root_category_id":3,
            "specs":[
                {
                    "key_id":1,
                    "key":"颜色",
                    "value_id":44,
                    "value":"橘黄色"
                },
                {
                    "key_id":3,
                    "key":"图案",
                    "value_id":9,
                    "value":"七龙珠"
                },
                {
                    "key_id":4,
                    "key":"尺码",
                    "value_id":14,
                    "value":"小号 S"
                }
            ],
            "code":"2$1-44#3-9#4-14",
            "stock":7
        }
    ],
    "spu_img_list":[
        {
            "id":165,
            "img":"http://i1.sleeve.7yue.pro/assets/5605cd6c-f869-46db-afe6-755b61a0122a.png",
            "spu_id":2
        }
    ],
    "spu_detail_img_list":[
        {
            "id":24,
            "img":"http://i2.sleeve.7yue.pro/n4.png",
            "spu_id":2,
            "index":1
        }
    ],
    "sketch_spec_id":1,
    "default_sku_id":2
}';
        return json_decode($str, true);
    }

    public function getLatestSpuProductList()
    {
        $str = '{
    "total": 17,
    "count": 17,
    "page": 0,
    "total_page": 1,
    "items": [
        {
            "id": 23,
            "title": "双色牛仔裤",
            "subtitle": "秋冬新款，做一个Cool Boy",
            "img": "http://i2.sleeve.7yue.pro/n11.png",
            "for_theme_img": "http://i1.sleeve.7yue.pro/assets/702f2ce9-5729-4aa4-aeb3-921513327747.png",
            "price": "1399",
            "discount_price": null,
            "description": null,
            "tags": "",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 10,
            "title": "碳素墨水",
            "subtitle": "虽然我们早已不再使用钢笔书写，但钢笔在纸上划过的笔触永远是键盘无法替代的。一只钢笔+一瓶墨水在一个安静的午后，写写内心的故事。",
            "img": "http://i2.sleeve.7yue.pro/m24.png",
            "for_theme_img": "",
            "price": "80.00",
            "discount_price": "69.00",
            "description": null,
            "tags": "",
            "sketch_spec_id": null,
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 3,
            "title": "抹茶小橡皮",
            "subtitle": "小作文写错了，用它擦一擦",
            "img": "http://i2.sleeve.7yue.pro/m17.png",
            "for_theme_img": "https://gitee.com/lrelia7/sleeve-static/raw/master/theme/spu2.png",
            "price": "29.99",
            "discount_price": "17.00",
            "description": null,
            "tags": "一飞推荐",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 15,
            "title": "多彩别针、回形针",
            "subtitle": "每盒70个，可爱多彩",
            "img": "http://i2.sleeve.7yue.pro/m26.png",
            "for_theme_img": null,
            "price": "24",
            "discount_price": "19.9",
            "description": null,
            "tags": "三色可选",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 14,
            "title": "Ins 复古小夹子（Mini)",
            "subtitle": "静静的，享受时光的流逝",
            "img": "http://i2.sleeve.7yue.pro/m23.png",
            "for_theme_img": null,
            "price": "19.9",
            "discount_price": null,
            "description": null,
            "tags": "三色可选",
            "sketch_spec_id": null,
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 8,
            "title": "Ins复古碎花NoteBook",
            "subtitle": "林白默默的掏出小本本，将她说的话一次不漏的记了下来。",
            "img": "http://i2.sleeve.7yue.pro/m19.png",
            "for_theme_img": "http://i1.sleeve.7yue.pro/assets/b6442702-4810-46cb-bb0b-f4602d38e4ff.png",
            "price": "29.99",
            "discount_price": "27.8",
            "description": null,
            "tags": "林白推荐",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 28,
            "title": "Ins复古金色落地灯",
            "subtitle": "Instagram复古台灯，就在此刻回到过去，找寻逝去的记忆",
            "img": "http://i2.sleeve.7yue.pro/a9.png",
            "for_theme_img": "",
            "price": "999",
            "discount_price": null,
            "description": null,
            "tags": "Ins$复古流行",
            "sketch_spec_id": "8",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 26,
            "title": "SemiConer柔质沙发",
            "subtitle": "窝在沙发上，一杯红酒配电影",
            "img": "http://i2.sleeve.7yue.pro/3.png",
            "for_theme_img": "",
            "price": "4799",
            "discount_price": "4200",
            "description": null,
            "tags": "",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 25,
            "title": "复古双色沙发",
            "subtitle": "双色可选，经典青黄两色",
            "img": "http://i2.sleeve.7yue.pro/h3.png",
            "for_theme_img": "",
            "price": "3999",
            "discount_price": null,
            "description": null,
            "tags": "复刻经典$双色可选",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 24,
            "title": "秋冬新款驼色大衣",
            "subtitle": "2020新款，暖暖过秋冬",
            "img": "http://i2.sleeve.7yue.pro/n3.png",
            "for_theme_img": "http://i1.sleeve.7yue.pro/assets/b8e510a1-8340-43c2-a4b0-0e56a40256f9.png",
            "price": "2999",
            "discount_price": "2699",
            "description": null,
            "tags": "经典单色",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 27,
            "title": "Mier双色靠椅",
            "subtitle": "安静的午后，一杯清茶，追忆似水年华。看清风浮动，看落日余晖",
            "img": "http://i2.sleeve.7yue.pro/h1.png",
            "for_theme_img": "http://i1.sleeve.7yue.pro/assets/f6c9fce8-626f-44c0-a709-3f6ef9f3fbef.png",
            "price": "1299",
            "discount_price": null,
            "description": null,
            "tags": "",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 12,
            "title": "林间有风测试商品",
            "subtitle": "测试商品，可购买体验完整支付和订单流程",
            "img": "http://i2.sleeve.7yue.pro/x1.png",
            "for_theme_img": "",
            "price": "0.2",
            "discount_price": null,
            "description": null,
            "tags": "测试数据$可支付",
            "sketch_spec_id": null,
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 11,
            "title": "飞行员墨镜",
            "subtitle": "戴起来像小李子",
            "img": "http://i2.sleeve.7yue.pro/n2.png",
            "for_theme_img": "",
            "price": "77.00",
            "discount_price": null,
            "description": null,
            "tags": null,
            "sketch_spec_id": null,
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 6,
            "title": "Sleeve风袖说牛仔系列",
            "subtitle": "Sleeve风袖说当季经典款",
            "img": "http://i2.sleeve.7yue.pro/n14.png",
            "for_theme_img": "",
            "price": "1799",
            "discount_price": "",
            "description": null,
            "tags": "包邮$热门",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 2,
            "title": "林间有风自营针织衫",
            "subtitle": "秋日冬款，浪漫满屋",
            "img": "http://i1.sleeve.7yue.pro/assets/ecf8d824-19d4-4db2-a5da-872ab014fecd.png",
            "for_theme_img": "https://gitee.com/lrelia7/sleeve-static/raw/master/theme/spu1.png",
            "price": "77.00",
            "discount_price": "62.00",
            "description": null,
            "tags": "秋日冬款$浪漫满屋",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 4,
            "title": "印花桌布",
            "subtitle": "生活需要仪式感，吃饭也一样。桌旗+桌布给你绚烂的生命色彩",
            "img": "http://i2.sleeve.7yue.pro/n10.png",
            "for_theme_img": "",
            "price": "119.00",
            "discount_price": "97.00",
            "description": null,
            "tags": "风袖臻选",
            "sketch_spec_id": "5",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        },
        {
            "id": 1,
            "title": "青锋大碗",
            "subtitle": "大碗主要用来盛宽面，凡凡倾情推荐",
            "img": "http://i2.sleeve.7yue.pro/n9.png",
            "for_theme_img": "",
            "price": "12.99",
            "discount_price": "11.11",
            "description": null,
            "tags": "林白推荐",
            "sketch_spec_id": "1",
            "max_purchase_quantity": null,
            "min_purchase_quantity": null
        }
    ]
}';
        return json_decode($str, true);
    }

    public function getSpuProductByCategoryID()
    {
        $str = '    {"total":5,
    "count":10,
    "page":0,
    "total_page":1,
    "items":[
        {
            "id":10,
            "title":"英雄碳素墨水",
            "subtitle":"虽然我们早已不再使用钢笔书写，但钢笔在纸上划过的笔触永远是键盘无法替代的。一只钢笔+一瓶墨水在一个安静的午后，写写内心的故事。",
            "img":"http://i1.sleeve.7yue.pro/assets/0bb351c7-4dba-4403-8d4e-f98a2f440098.png",
            "for_theme_img":"",
            "price":"80.00",
            "discount_price":"69.00",
            "description":null,
            "tags":"",
            "sketch_spec_id":null,
            "max_purchase_quantity":null,
            "min_purchase_quantity":null
        }
    ]
    }';
        return json_decode($str, true);
    }
}