/*
live search
 */
$('#search').on('keyup', function(){
    $value = $(this).val();
    $none = '<p id="noResults" class="alert alert-danger">No results</p>'
    $.ajax({
        type: 'GET',
        url: './searchit',
        data: {'search':$value},
        success: function(data){
            if (data == '') {
                $('#noResults').replaceWith($none);
                $('#table').hide();
            }else{
                $('#table').show();
                $('#pagination').hide();
                $('tbody').html(data);
                $('#noResults').hide();
            }
        }
    });
})

/*
checks for duplication of the registration number, nhif card no, and file number
 */
$('#reg_no_input').on('blur', function(){
    $reg_value = $(this).val();
    $.ajax({
         type: 'GET',
         url: './validRegNo',
         data: {'validValue' : $reg_value},
         success: function(name){
             if (name!== '') {
                alert('Registration number entered belongs to: '+name.toUpperCase());
             }
         }

    })
})

$('#nhif_input').on('blur', function(){
    $nhif_value = $(this).val();
    $.ajax({
        type: 'GET',
        url: './validNhifNo',
        data: {'validValue': $nhif_value},
        success: function(data){
            if (data!== '') {
                alert('NHIF card number already exist as: '+data.toUpperCase());
            }
        }
    })
})

$('#file_input').on('blur', function(){
    $nhif_value = $(this).val();
    $.ajax({
        type: 'GET',
        url: './validFiileNo',
        data: {'validValue': $nhif_value},
        success: function(data){
            if (data!== '') {
                alert('NHIF card number already exist as: '+data.toUpperCase());
            }
        }
    })
})

/*
confirm delete
 */
// $('#btn-del').on('click', function(){
//     var confirmDelete = confirm('Are you sure?');
//     var id = $(this).attr('data-value');

//     alert(confirmDelete+id);
//     if (confirmDelete) {
//         $.ajax({
//             type: 'POST',
//             url: './confirmDel',
//             data: {data:id},
//             success: function(){

//             }
//         })
//     }else{
//         //window.location("./home");
//         window.location = "./homew";
//     }
    
//     }
// })