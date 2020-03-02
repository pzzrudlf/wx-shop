// components/realm/index.js
import {FenceGroup} from "../models/fence-group";

Component({
    /**
     * 组件的属性列表
     */
    properties: {
        spu: Object
    },

    lifetimes: {
        attached(){

        },
        ready(){

        }
    },

    observers: {
        'spu': function (spu) {
            if(!spu){
                return
            }
            const fencegroup = new FenceGroup(spu)
            fencegroup.initFences()
            this.bindInitData(fencegroup)
        }
    },
    /**
     * 组件的初始数据
     */
    data: {

    },

    /**
     * 组件的方法列表
     */
    methods: {
        bindInitData(fenceGroup) {
            this.setData({
                fences: fenceGroup.fences
            })
        }
    }
})
