$(document).ready(function () {

//    Company Table
    var $companyTable = $('#companyTable');

    $companyTable.bootstrapTable({
        url: 'Recruitments/getCompanies/0',
        onClickRow: function (data, row) {
            companyDetails(data);
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
        $companyTable.bootstrapTable('refresh', {url: 'Recruitments/getCompanies/'+$stat});
    });
});

//show company Details
function companyDetails(data) {
    $status = $('#compStatus').val();
    if($status === '1'){
        $('#buttonsDiv').attr('hidden','hidden');
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
    $('#archive').attr('onclick', 'archiveCompany(' + data.company_id + ')');
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
