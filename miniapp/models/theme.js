import {config} from "../config/config";
import {Http} from "../utils/http";

class Theme
{
    static LocationA = 't-1'
    static LocationE = 't-2'
    static LocationF = 't-3'
    static LocationH = 't-4'
    themes = []
    async getThemes() {
        const names = `${Theme.LocationA},${Theme.LocationE},${Theme.LocationF},${Theme.LocationH}`
        this.themes = await Http.request({
            url: 'theme/by/names',
            data: {
                names
            }
        })
    }

    // find map filter reduce some
    async getHomeLocationA() {
        return this.themes.find(t => t.name === Theme.LocationA)
    }
    async getHomeLocationE() {
        return this.themes.find(t => t.name === Theme.LocationE)
    }
    async getHomeLocationF() {
        return this.themes.find(t => t.name === Theme.LocationF)
    }
    async getHomeLocationH() {
        return this.themes.find(t => t.name === Theme.LocationH)
    }

    static getHomeLocationESpu()
    {
        return Theme.getThemeSpuByName(Theme.LocationE)
    }

    static getThemeSpuByName(name)
    {
        return Http.request({
            url: `theme/name/${name}/with_spu`
        })
    }
}

export {
    Theme
}