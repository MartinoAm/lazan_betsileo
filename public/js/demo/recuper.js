// $(document).ready(function () {
//     $('#produit').change(function () {
//         var id = $(this).val();
//         $.ajax({
//             url: '/commande',
//             type: 'GET',
//             data: { id: id },
//             success: function (repose) {
//                 $('#prix').val(repose.prix_unit);
//                 console.log(repose);
//             },
//             error: function (xhr) {
//                 console.log(xhr.responseText);
//             }
//         });
//     });
// });


$(document).ready(function () {
    $('#produit').change(function () {
        var produitPrix = $(this).val();

        $.ajax({
            url: '/commande',
            type: 'GET',
            success: function (response) {
                $('#prix').val(response.produitPrix);
                console.log(response);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});
