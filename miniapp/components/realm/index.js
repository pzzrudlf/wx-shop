// components/realm/index.js
import {FenceGroup} from "../models/fence-group";
import {Judger} from "../models/judger";

Component({
    /**
     * 组件的属性列表
     */
    properties: {
        spu: Object,
        judger: Object
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
            const judger = new Judger(fencegroup)
            this.data.judger = judger
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
        },

        onCellTap(event) {
            const cell = event.detail.cell
            // console.log(event.detail)
            const x = event.detail.x
            const y = event.detail.y
            const judger = this.data.judger
            judger.judge(cell, x, y)
            this.setData({
                fences: judger.fenceGroup.fences
            })
        }
    }
})
