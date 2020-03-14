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
    console.log(target);

    $.post($(this).attr('href'), $(target).serialize())
        .done(function(response){
            console.log(response, 'done')
            // resetRenderError()
            // addMsg()
            // reloadTable()
        })
        .fail(function(data){
            console.log('fail')
            // requestErrors(data.responseJSON)
        })
        .always(function(response){
            console.log(response, 'awlays')
            // btnElement.html(btnLabel)
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
            console.log(response, 'done')
            resetRenderError()
            addMsg()
            reloadTable()
        })
        .fail(function(data){
            console.log('fail')
            requestErrors(data.responseJSON)
        })
        .always(function(response){
            console.log(response, 'awlays')
            btnElement.html(btnLabel)
        })
})


function requestErrors(request)
{
    if (request.errors) {
        resetRenderError()
        Object.keys(request.errors).forEach(function(key) {
            console.log(key, request.errors[key][0])
            renderErrorFor(key, request.errors)
        })

    }
}

function renderErrorFor(field, errors) {
    let nameField = nestedName(field)
    let inputField = $(`input[name="${nameField}"]`)
    let content = `
        <strong>${errors[field][0]}</strong>
    `
    inputField.addClass('is-invalid')
    inputField.next('.invalid-feedback').html(content)
}

function nestedName(name){
    let split_name = name.split('.')
    console.log(split_name)

    return split_name.length > 1 ? `${split_name[0]}[${split_name[1]}]` : name
}

function resetRenderError() {
    console.log('entra')

    let inputField = $(`${form_nuevo_usuario} input:not([name="password_confirmation"])`)
    inputField.removeClass("is-invalid")
    inputField.addClass("is-valid")
    inputField.next('.invalid-feedback').html('')
}

function loading(target) {
    $(target).html(loadingAjax)
}

function addMsg()
{
    console.log('entra');

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
    console.log('entra a reload table')
    $('.table-responsive').fadeOut('slow')

    const urlForm = '/admin/usuarios/lista'
    const target = '#ajaxTable'
    loading(target)

    $.get(urlForm, function (data) {
        $(`${target}`).html(data)
    })
}
