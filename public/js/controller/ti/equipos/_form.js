$(document).ready(function() {
    $('.select2').select2();
    $('.select-parent').on('change', function(){
        const selectElement = $(this)
        const data_id = selectElement.children("option:selected").val();

        const urlForm = `/filtro/so/${data_id}/versiones`
        const target = selectElement.data('target')
        console.log(target)

        const targetElement = $(target)
        $(targetElement).prop('disabled', true)
        console.log(targetElement.attr('name'))
        fillSelect(urlForm, targetElement, function(){
            $(targetElement).select2()
            $(targetElement).prop('disabled', false)

        })
    })

    function loading(target) {
        $(target).html(loadingAjax)
    }

    function fillSelect(urlForm, targetElement, callback = null){
        $.get(urlForm, function (resp) {
            targetElement.find('option').remove()
            resp.data.forEach(element => {
                targetElement.append($('<option>').val(element.id).text(element.nombre).prop('title', element.descripcion))
                console.log(element.nombre, element.id, element.descripcion)
            })
            callback()
        })
    }
});
