import {Cell} from "./cell";

class Fence{
    cells = []
    specs
    id
    title

    constructor(specs) {
        // console.log(specs)
        this.specs = specs
        this.id = specs[0].key_id
        this.title = specs[0].key
    }

    init(){
        this._initCells()
        // console.log(this.cells)
    }

    _initCells()
    {
        this.specs.forEach((spec) => {
            // this.pushValueTile(s.value)
            const existed = this.cells.some((cell) => {
                return cell.id === spec.value_id
            })
            if(existed)
            {
                return
            }
            const cell = new Cell(spec)
            this.cells.push(cell)
        })
    }

    // pushValueTile(title){
    //     this.valueTitles.push(title)
    // }
}

export {
    Fence
}