class Cell{
    id
    title
    spec
    constructor(spec){
        this.title = spec.value
        this.id = spec.value_id
        this.spec = spec
    }
}

export {
    Cell
}