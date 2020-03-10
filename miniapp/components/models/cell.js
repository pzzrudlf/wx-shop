import {CellStatus} from "../../core/enum";

class Cell{
    id
    title
    spec
    status = CellStatus.WAITING
    constructor(spec){
        this.title = spec.value
        this.id = spec.value_id
        this.spec = spec
    }
}

export {
    Cell
}