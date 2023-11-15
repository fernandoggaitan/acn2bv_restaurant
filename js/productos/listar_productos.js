const btn_eliminar = document.querySelectorAll('.btn-eliminar');

btn_eliminar.forEach(btn => {

    //Recorro cada uno de los botones a eliminar.

    //Agregamos el evento click a cada botón.
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        let href = btn.href;

        Swal.fire({
            title: "¿Está segura/o?",
            text: "El registro no se podrá recuperar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#198754",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = href;
            }
        });

        /*
        let is_confirm = confirm('¿Está segura/o que desea eliminar este registro?');
        if(is_confirm)
        {
            location.href = href;
        }
        */


    });

});
