// var selectField = document.getElementById('pelanggan_pembelian');
// var inputField = document.getElementById('diskon_pembelian');

// selectField.addEventListener('change', function() {
//     inputField.value = selectField.value;
// });

$('#pelanggan_pembelian').on('change', function(){
    var selected = $(this).val();
    $('#diskon_pembelian').val(selected);
});