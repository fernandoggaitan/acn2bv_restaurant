const btn_delete = document.querySelectorAll('.btn-delete');

btn_delete.forEach( (item) => {

    item.addEventListener('click', (e) => {

        e.preventDefault();

        let seguro = confirm('Está segura/o que desea eliminar este producto?');

        if(seguro)
        {
            location.href = item.href;
        }

    });

} );