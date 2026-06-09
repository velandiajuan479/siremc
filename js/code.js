$(document).ready(function () {
    let table = document.getElementById("myTable");
    if (!table) return;

    $('#myTable').DataTable({
        layout: {
            topStart: {
                buttons: [
                    {
                        extend: 'copy',
                        text: '<i class="fas fa-copy"></i> ',
                        titleAttr: 'Copiar al portapapeles',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv"></i> ',
                        titleAttr: 'Exportar a CSV',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"></i> ',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-primary'
                    }
                ]
            },
            bottomStart: 'pageLength'
        },
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "sProcessing": "Procesando..."
        }
    });
});




function eliminar(txt){
	let mjs = confirm("¿Desea eliminar el registro "+txt+"?");
	return mjs;
}