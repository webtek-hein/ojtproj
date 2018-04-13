$(document).ready(function () {
    //Company Table
    var $companyTable = $('#companyTable');
    var $scheduleTable = $('#scheduleTable');

    // company table
    $companyTable.bootstrapTable({
        url: 'Recruitments/getCompanies/0',
        onClickRow: function (data, row) {
            index = row.data('index');
            companyDetails(data, index);
        },
        rowStyle:function rowStyle(row, index) {
            return {
                css: {"cursor": "pointer"}
            };
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

    //userCompany Table
    $('#userCompany').bootstrapTable({
        url: 'Recruitments/getCompanies/0',
        onClickRow: function (data, row) {
            userCompanydetails(data);
        },
        rowStyle:function rowStyle(row, index) {
            return {
                css: {"cursor": "pointer"}
            };
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

    //schedule table
    $scheduleTable.bootstrapTable({
        url: 'Recruitments/getSchedule/All',
        onClickRow: function (data, row) {
            schedDetails(data);
        },
        columns: [{
            field: 'date',
            title: 'Date'
        }, {
            field: 'time',
            title: 'Time'
        }, {
            field: 'location',
            title: 'Location'
        }, {
            field: 'room',
            title: 'Room'
        }, {
            field: 'company',
            title: 'Company'
        }, {
            field: 'type',
            title: 'Type'
        }, {
            field: 'slots',
            title: 'Slots'
        }]
    });

    //company options
    //on change options
    $('#eventTypeOpts').change(function () {
        $eventType = $(this).val();
        $scheduleTable.bootstrapTable('refresh', {url: 'Recruitments/getSchedule/' + $eventType});
    });
    $.ajax({
        url: 'Recruitments/getCompanies/0',
        dataType: 'JSON',
        success: function (data) {
            options = [];
            for (var i = 0; i <= data.length - 1; i++) {
                options.push('<option value=' + data[i].company_id + '>' + data[i].company_name) + '</option>';
            }
            $('#companyOptions').html(options);
        }
    });

    $('#usersTable').bootstrapTable({
        url: 'Recruitments/getUsers',
        onClickRow: function (data, row) {
            schedDetails(data);
        },
        columns: [{
            field: 'id_num',
            title: 'ID No.'
        }, {
            field: 'name',
            title: 'Name'
        }, {
            field: 'user_type',
            title: 'User Type'
        }, {
            field: 'course',
            title: 'Course'
        }, {
            field: 'year',
            title: 'Year'
        }]
    });

});

//show company Details
function companyDetails(data, index) {
    $status = $('#compStatus').val();
    if ($status === '1') {
        $('#editBtn').attr('hidden', 'hidden');
        $('#archive').attr('hidden', 'hidden');
        $('#revert').attr('onclick', 'revertCompany(' + data.company_id + ')').removeAttr('hidden');
    } else {
        companyInfo = JSON.stringify(data);
        $('#editBtn').removeAttr('hidden').attr('onclick', 'editCompanyInfo(' + data.company_id + ',' +
            companyInfo + ')');
        $('#saveBtn').attr('onclick', 'saveCompanyInfo(' + data.company_id + ',' + index + ')');
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
    if(data.about !== null){
        $('#desc').html(data.about);
    }else{
        $('#desc').html('<button onclick="addDesc()" class="btn btn-primary">Add description</button>');
    }
}
//add description
function addDesc() {
    alert('test');
}
//show schedule details
function schedDetails(data) {
    toggleDiv($('#details'), $('#main'));
    //assign dynamic data
    $('#company').val(data.company);
    $('#eventType').val(data.type);
    $('#date').val(data.date);
    $('#time').val(data.time);
    $('#location').val(data.location);
    $('#room').val(data.room);
    $('#slots').val(data.slots);
    //appointment table
    $('#appointments').bootstrapTable({
        url: 'Recruitments/getAppointment/' + data.sched_id,
        columns: [{
            field: 'id_num',
            title: 'ID No.'
        }, {
            field: 'name',
            title: 'Name'
        }, {
            field: 'user_type',
            title: 'User Type'
        }, {
            field: 'course',
            title: 'Course'
        }, {
            field: 'year',
            title: 'Year'
        }, {
            field: 'appointment_date',
            title: 'Date Registered'
        }]
    });
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
function editCompanyInfo(id, data) {
    old = JSON.stringify($('#details').html());
    $('#canceltBtn').attr('onclick', 'cancelEditting(' + old + ')');
    $('.edtInfo').each(function (key, value) {
        text = value.innerHTML;
        $('#' + value.id).replaceWith('<input class="form-control" name="' + value.id + '" id=' + value.id + ' value="' + text + '"></input>');
    });
    $('#editButtons').removeAttr('hidden');
    $('#mainButtons').attr('hidden', 'hidden');
}

//cancel editting
function cancelEditting(old) {
    $('#details').html(old);
    $('#editButtons').attr('hidden', 'hidden');
    $('#mainButtons').removeAttr('hidden');
}

//save company information
function saveCompanyInfo(id, index) {
    data = $('#details :input').serializeArray();
    $.ajax({
        url: 'Recruitments/updateCompanyDetails/' + id,
        type: 'POST',
        data: data,
        success: function (result) {
            $('#companyTable').bootstrapTable('refresh', {url: 'Recruitments/getCompanies/0'});
            $('#canceltBtn').click();
            $('#detailBack').click();
        }
    })


}

//appointment 
function appointmentAction($sched_id,$action) {
    $.ajax({
        url: 'Recruitments/userAppointments/'+ $sched_id +'/'+ $action,
        success: function (result) {
            location.reload();
        }
    })
}

//view company
function userCompanydetails(data) {
    $('#info').removeAttr('hidden');
    $('#noComp').attr('hidden','hidden');
    $('#address').html(data.address);
    $('#contact').html(data.mobile_num);
    if(data.about !== null){
        $('#aboutUs').html(data.about);
    }else{
        $('#aboutUs').html('No description.');
    }

}