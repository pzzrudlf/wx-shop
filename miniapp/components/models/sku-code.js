import {combination} from "../../utils/utils";

class SkuCode {
    code
    spuId
    totalSegments = []

    constructor(code) {
        this.code = code
        this._splitToSegments()
    }

    _splitToSegments() {
        const spuAndSpec = this.code.split('$')
        this.spuId = spuAndSpec[0]

        const specCodeArray = spuAndSpec[1].split('#')
        const length = specCodeArray.length

        for(let i=1;i<=length;i++) {
            const segments = combination(specCodeArray, i)
            const newseg = segments.map(segs=>{
                return segs.join('#')
            })
            this.totalSegments = this.totalSegments.concat(newseg)
        }

    }
}

export {
    SkuCode
}