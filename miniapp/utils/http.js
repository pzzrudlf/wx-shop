import {config} from "../config/config";
import {promisic} from "./utils";

class Http
{
    static async request({url, data, method='GET'})
    {
        const res = await promisic(wx.request)({
            url: `${config.appBaseUrl}${url}`,
            data,
            method,
            header: {
                appKey: config.appKey
            }
        })
        return res.data
    }
}

export {
    Http
}