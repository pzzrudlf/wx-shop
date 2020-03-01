import {Paging} from "../utils/paging";

class ProductPaging {

    static getLatestPaging()
    {
        return new Paging({
            url: `spu/latest`
        },5)
    }
}

export {
    ProductPaging
}