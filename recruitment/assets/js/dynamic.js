$(document).ready(function () {
    //Company Table
    var $companyTable = $('#companyTable');

    $companyTable.bootstrapTable({
        url: 'Recruitments/getCompanies/0',
        onClickRow: function (data, row) {
            index = row.data('index');
            companyDetails(data,index);
        },
        columns: [{
            formatter: function (data, row) {
                return '<img src="assets/images/logo-icon.png"></img>';
            },
            field: 'logo',
            title: '',
            align: 'center',
            width: '15%'
        }, {
            field: 'company_name',
            title: 'Company Name',
            align: 'left',
            width: '85%'
        }]
    });
    //on change select in company
    $('#compStatus').change(function () {
        $stat = $(this).val();
        $companyTable.bootstrapTable('refresh', {url: 'Recruitments/getCompanies/' + $stat});
    });
});

//show company Details
function companyDetails(data,index) {
    $status = $('#compStatus').val();
    if ($status === '1') {
        $('#editBtn').attr('hidden', 'hidden');
        $('#archive').attr('hidden', 'hidden');
        $('#revert').attr('onclick', 'revertCompany(' + data.company_id + ')').removeAttr('hidden');
    } else {
        companyInfo = JSON.stringify(data);
        $('#editBtn').removeAttr('hidden').attr('onclick', 'editCompanyInfo(' + data.company_id + ','+
            companyInfo+')');
        $('#saveBtn').attr('onclick', 'saveCompanyInfo(' + data.company_id + ','+index+')');
        $('#archive').removeAttr('hidden').attr('onclick', 'archiveCompany(' + data.company_id + ')');
        $('#revert').attr('hidden', 'hidden');
    }

    toggleDiv($('#details'), $('#main'));
    //assign dynamic data
    $('#company_name').html(data.company_name);
    $('#address').html(data.address);
    $('#contact_person').html(data.contact_person);
    $('#mobile_num').html(data.mobile_num);
    $('#tel').html(data.tel_num);
    $('#alt_number').html(data.alt_number);
    $('#email').html(data.email);
}

//toggle hidden class of element
function toggleDiv(elementToShow, elementToHide) {
    elementToShow.removeAttr('hidden');
    elementToHide.attr('hidden', 'hidden');

}

//archive companies
function archiveCompany(id) {
    var $companyTable = $('#companyTable');
    $.ajax({
        url: 'Recruitments/archiveCompany/' + id,
        success: function (result) {
            $companyTable.bootstrapTable('refresh', {url: 'Recruitments/getCompanies/0'});
            toggleDiv($('#main'), $('#details'));
        }
    })

}

//revert companies
function revertCompany(id) {
    var $companyTable = $('#companyTable');
    $.ajax({
        url: 'Recruitments/revertCompany/' + id,
        success: function (result) {
            $companyTable.bootstrapTable('refresh', {url: 'Recruitments/getCompanies/1'});
            toggleDiv($('#main'), $('#details'));
        }
    })

}
//editCompanyInfo
function editCompanyInfo(id,data) {
    old = JSON.stringify($('#details').html());
    $('#canceltBtn').attr('onclick', 'cancelEditting('+old+')');
    $('.edtInfo').each(function( key, value ) {
        text = value.innerHTML;
        $('#'+value.id).replaceWith('<input class="form-control" name="'+value.id+'" id='+value.id +' value="'+text+'"></input>');
    });
    $('#editButtons').removeAttr('hidden');
    $('#mainButtons').attr('hidden', 'hidden');
}
//cancel editting
function cancelEditting(old) {
    $('#details').html(old);
    $('#editButtons').attr('hidden','hidden');
    $('#mainButtons').removeAttr('hidden');
}
function saveCompanyInfo(id,index) {
    data = $('#details :input').serializeArray();
    $.ajax({
        url: 'Recruitments/updateCompanyDetails/'+id,
        type: 'POST',
        data: data,
        success: function (result) {
            $('#companyTable').bootstrapTable('refresh', {url: 'Recruitments/getCompanies/0'});
            $('#canceltBtn').click();
            $('#detailBack').click();
        }
    })


}

