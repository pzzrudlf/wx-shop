import {Matrix} from "../../models/matrix";
import {Fence} from "./fence";

class FenceGroup{
    spu
    sku_list = []
    constructor(spu) {
        this.spu = spu
        this.sku_list = spu.sku_list
    }

    initFences() {
        const matrix = this._createMatrix(this.sku_list)
        let fences = []
        let currentJ = -1
        matrix.forEach((element, i, j) => {
            if(currentJ !== j){
                currentJ = j
                fences[currentJ] = this._createFence()
            }
            fences[currentJ].pushValueTile(element.value)
        })
        console.log(fences)
    }

    _createFence() {
        const fence = new Fence()
        return fence
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
