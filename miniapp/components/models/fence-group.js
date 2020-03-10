import {Matrix} from "./matrix";
import {Fence} from "./fence";

class FenceGroup{
    spu
    sku_list = []
    fences

    constructor(spu) {
        this.spu = spu
        this.sku_list = spu.sku_list
    }

    // initFences() {
    //     const matrix = this._createMatrix(this.sku_list)
    //     let fences = []
    //     let currentJ = -1
    //     matrix.each((element, i, j) => {
    //         if(currentJ !== j){
    //             currentJ = j
    //             fences[currentJ] = this._createFence()
    //         }
    //         fences[currentJ].pushValueTile(element.value)
    //     })
    //     console.log(fences)
    // }

    initFences() {
        const matrix = this._createMatrix(this.sku_list)
        const fences = []
        const AT = matrix.transpose()
        AT.forEach((r) => {
            const fence = new Fence(r)
            fence.init()
            fences.push(fence)
        })
        this.fences = fences
        // console.log(fences)
    }

    _createMatrix(sku_list){
        const m = [];
        sku_list.forEach((sku) => {
            m.push(sku.specs)
        })
        return new Matrix(m)
    }
}

export {
    FenceGroup
}
