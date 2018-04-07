$(document).ready(function () {

//    Company Table
    var $companyTable = $('#companyTable');

    $companyTable.bootstrapTable({
        url: 'Recruitments/getCompanies',
        onClickRow:function (data,row) {
            companyDetails(data);
        },
        columns: [{
            field: 'logo',
            title: ''
        },{
            field: 'company_name',
            title: 'Company Name'
        }]
    });
});
//show company Details
function companyDetails(data) {
    alert(data.company_id);
    toggleDiv($('#details'),$('#main'));
}

//toggle hidden class of element
function toggleDiv(elementToShow, elementToHide) {
    elementToShow.removeAttr('hidden');
    elementToHide.attr('hidden', 'hidden');

}
