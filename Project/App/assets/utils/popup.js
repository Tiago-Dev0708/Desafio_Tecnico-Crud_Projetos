document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);

    if (params.has('success')) {
        Swal.fire({
            icon: 'success',
            title: 'Sucesso',
            text: params.get('success')
        });
    } else if (params.has('error')) {
        Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: params.get('error')
        });
    }
});

function confirmDelete() {
    return confirm("Tem certeza que deseja excluir este projeto?");
}

