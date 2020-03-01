import {Http} from "./http";
import boolean from "../miniprogram_npm/lin-ui/common/async-validator/validator/boolean";

class Paging {
    /**
     *
     */
    start
    count
    req
    url
    locker = false
    moreData = true
    accumulator = []

    constructor(req, count=10, start=0)
    {
        this.url = req.url
        this.req = req
        this.count = count
        this.start = start
    }

    async getMoreData()
    {
        //getLocker
        //request
        //releaseLocker
        if(!this.moreData) return
        if(!this._getLocker()) return
        const data = await this._actualGetData()
        this._releaseLocker()
        return data
    }

    async _actualGetData()
    {
        let req = this._getCurrentReq()
        const paging = await Http.request(req)
        if(!paging)
        {
            return null
        }
        if(paging.total == 0) {
            return {
                empty: true,
                items: [],
                moreData: false,
                accumulator: []
            }
        }
        this.moreData = Paging._getMoreData(paging.total_page, paging.page)
        if(this.moreData)
        {
            this.start += this.count
        }

        this._accumulate(paging.items)

        return {
            empty: false,
            items: paging.items,
            moreData: this.moreData,
            accumulator: this.accumulator
        }

    }

    _accumulate(items)
    {
        this.accumulator = this.accumulator.concat(items)
    }

    static _getMoreData(totalPage, pageNum)
    {
        return pageNum < totalPage - 1
    }

    _getCurrentReq()
    {
        let url = this.url
        const params = `start=${this.start}&count=${this.count}`
        if(url.includes('?'))
        {
            url += '&' + params
        }else{
            url += '?' + params
        }
        this.req.url = url
        return this.req
    }

    _getLocker()
    {
        if(this.locker)
        {
            return false
        }
        this.locker = true
        return true
    }

    _releaseLocker()
    {
        this.locker = false
    }

}

export {
    Paging
}