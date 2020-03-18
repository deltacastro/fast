const form_nuevo_usuario = '#form-nuevoUsuario'

$(document).ready(function(){
    reloadTable()
})

$('.nuevoUsuario').on('click', function(){
    const urlForm = '/admin/usuarios/nuevo'
    $('#modal-save').data('postUrl', urlForm)
    const target = $(this).data('target')
    loading(`${target} div.modal-body`)
    $(target).modal('show')

    $.get(urlForm, function (data) {
        $(`${target} div.modal-body`).html(data)
    })
})

$('#ajaxTable').on('click', '.edit-user', function(e){
    e.preventDefault()
    const urlForm = $(this).attr('href')
    $('#modal-save').data('postUrl', urlForm)
    const target = $(this).data('target')
    loading(`${target} div.modal-body`)
    $(target).modal('show')

    $.get(urlForm, function (data) {
        $(`${target} div.modal-body`).html(data)
    })
})

$('#ajaxTable').on('click', '.delete-user', function(e){
    e.preventDefault()
    const target = $(this).data('target')
    const anchor = $(this)
    const previousHtml = anchor.html()
    anchor.html('<span class="spinner-border" role="status" aria-hidden="true"></span>')

    $.post($(this).attr('href'), $(target).serialize())
        .done(function(response){
            if (response.eliminado == 0){
                anchor.removeClass('text-danger')
                anchor.addClass('text-success')
                anchor.html('<i class="fas fa-2x fa-user"></i>')
            } else if (response.eliminado == 1){
                anchor.removeClass('text-success')
                anchor.addClass('text-danger')
                anchor.html('<i class="fas fa-2x fa-user-slash"></i>')
            }
        })
        .fail(function(data){
            anchor.html(previousHtml)
        })
})

$('.modal-btn-true').on('click', function(){
    // $('#form-nuevoUsuario').submit()
    const btnElement = $(this)
    const btnLabel = btnElement.html()
    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>')
    $(form_nuevo_usuario).prev().fadeOut('1000',function(){
        $(this).remove()
    })

    $.post($(this).data('postUrl'), $(form_nuevo_usuario).serialize())
        .done(function(response){
            resetRenderError()
            addMsg()
            reloadTable()
        })
        .fail(function(data){
            requestErrors(data.responseJSON)
        })
        .always(function(response){
            btnElement.html(btnLabel)
        })
})


function requestErrors(request)
{
    if (request.errors) {
        resetRenderError()
        Object.keys(request.errors).forEach(function(key) {
            renderErrorFor(key, request.errors)
        })

    }
}

function renderErrorFor(field, errors) {
    let nameField = nestedName(field)
    let inputField = $(`[name="${nameField}"]`)
    let content = `
        <strong>${errors[field][0]}</strong>
    `
    inputField.addClass('is-invalid')
    inputField.next('.invalid-feedback').html(content)
}

function nestedName(name){
    let split_name = name.split('.')

    return split_name.length > 1 ? `${split_name[0]}[${split_name[1]}]` : name
}

function resetRenderError() {
    let inputField = $(`${form_nuevo_usuario} input:not([name="password_confirmation"]), ${form_nuevo_usuario} select:not(.no-validate)`)
    inputField.removeClass("is-invalid")
    inputField.addClass("is-valid")
    inputField.next('.invalid-feedback').html('')
}

function loading(target) {
    $(target).html(loadingAjax)
}

function addMsg()
{
    const msgAlert = `
        <div class="alert alert-success d-none" role="alert">
            Usuario guardado correctamente.
        </div>
    `
    $(form_nuevo_usuario).before(msgAlert).fadeIn('1000',function(){
        $(this).prev().removeClass('d-none')
    })
}

function resetInputs() {

}

function reloadTable() {
    $('#usuarios-table.table-responsive').fadeOut('slow')
    const urlForm = '/admin/usuarios/lista'
    const target = '#ajaxTable'
    loading(target)
    $.get(urlForm, function (data) {
        $(`${target}`).html(data)
    })
}
