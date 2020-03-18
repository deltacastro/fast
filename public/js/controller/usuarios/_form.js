$(document).ready(function(){
    $('#departamento-cargo-agregar').on('click', function(){
        const table_tbody = $('#table-departamento-cargo').children('tbody')

        // Se instancian los selects
        const select_departamento = $('#empleado_departamento')
        const select_cargo = $('#empleado_cargo')

        // Se guardan los ids
        const departamento_id = select_departamento.val()
        const cargo_id = select_cargo.val()

        // Valdamos si existe

        if (validateRepeat(departamento_id, cargo_id)) {
            return true
        }

        // Se busca el elemento option seleccionado
        const option_departamento = select_departamento.children('option:selected')
        const option_cargo = select_cargo.children('option:selected')

        // Obtenemos el nombre del cargo y departamento
        const departamento_nombre = option_departamento.html()
        const cargo_nombre = option_cargo.html()

        // String aleatorio para relacion de elementos
        const random_string = Math.random().toString(36).substring(7);

        // Se crean los td's del departamento y cargo
        const td_departamento = `
            <input class="departamento" name="empleado_cargo[${random_string}][departamento_id]" value="${departamento_id}" hidden>
            ${departamento_nombre}
        `
        const td_cargo = `
            <input class="cargo" name="empleado_cargo[${random_string}][cargo_id]" value="${cargo_id}" hidden>
            ${cargo_nombre}
        `

        // Se crea elemento para el boton eliminar
        const button_delete = `
            <button type="button" data-id="${random_string}" class="form-control btn btn-danger departamento-cargo-eliminar">Eliminar</button>
        `

        // Extructura
        const table_row = `
            <tr style="display:none" id="${random_string}">
                <td>
                    ${td_departamento}
                </td>
                <td>
                    ${td_cargo}
                </td>
                <td>
                    ${button_delete}
                </td>
            </tr>
        `

        table_tbody.prepend(table_row)
        $(`#${random_string}`).fadeIn('fast')
    })
})

$('#table-departamento-cargo').on('click', '.departamento-cargo-eliminar', function(){
    deleteRow($(this).data('id'))
})

function deleteRow(idRow)
{
    const element = $(`#${idRow}`)
    element.fadeOut('fast', function(){
        element.remove()
    })
}

function validateRepeat(departamento_id, cargo_id)
{
    const table = $('#table-departamento-cargo')
    const selector = `input[value="${departamento_id}"][class="departamento"]`
    let exist = false
    const departamento = table
    .children('tbody')
    .find(selector)
    .each(function(index){
        let name = this.name
        name = name.replace('departamento_id', 'cargo_id')
        const cargo = table.find(`input[name="${name}"][value="${cargo_id}"]`)
        if (cargo.val() !== undefined) {
            exist = true
            return false
        }
    })
    return exist

}
