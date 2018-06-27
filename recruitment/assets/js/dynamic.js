$(document).ready(function () {
    $.getJSON('Recruitments/newUsers', function(data){
        $('#newUsr').html(data);
    });

    $.getJSON('Recruitments/newMsgs', function(data){
        $('#newMsg').html(data);
    });

    //validate file size
    $('#companySub').click(function () {
        var file = $('input[name=logo]');

        //check whether browser fully supports all File API
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            //get the file size and file type from file input field
            var fsize = file[0].files[0].size;

            if (fsize > 1048576) //do something if file size more than 1 mb (1048576)
            {
                alert('File size too big.');
                file.replaceWith(file.val('').clone(true));
            }

        } else {
            alert('Upload not supported.');
        }
    });
    //Company Table
    var $companyTable = $('#companyTable');
    var $scheduleTable = $('#scheduleTable');
    var $eventTable = $('#eventTable');
    var $dashboardEvents = $('#events');

    // company table
    $companyTable.bootstrapTable({
        url: 'Recruitments/getCompanies/0',
        showExport: true,
        exportTypes: ['pdf', 'excel'],
        onClickRow: function (data, row) {
            index = row.data('index');
            companyDetails(data, index);
        },
        rowStyle: function rowStyle(row, index) {
            return {
                css: {"cursor": "pointer"}
            };
        },
        columns: [{
            formatter: function (row, data) {
                console.log();
                return '<img src="./uploads/' + data.image_url + '" height="42" width="42"></img>';
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
        rowStyle: function rowStyle(row, index) {
            return {
                css: {"cursor": "pointer"}
            };
        },
        columns: [{
            formatter: function (row, data) {
                return '<img src="./uploads/' + data.image_url + '" height="42" width="42"></img>';
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
        url: 'Recruitments/getSchedule/schedules/All',
        onClickRow: function (data, row) {
            schedDetails(data);
        },
        columns: [{
            field: 'date',
            title: 'Date',
            formatter: function (data) {
                date = new Date(data);
                var monthNames = [
                    "January", "February", "March",
                    "April", "May", "June", "July",
                    "August", "September", "October",
                    "November", "December"
                ];

                var day = date.getDate();
                var monthIndex = date.getMonth();
                var year = date.getFullYear();

                return monthNames[monthIndex] + ' ' + day + ' ' + year;
            }
        }, {
            field: 'time',
            title: 'Time',
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

    //event table
    $eventTable.bootstrapTable({
        url: 'Recruitments/getSchedule/events/All',
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

    //dashboard events
    $dashboardEvents.bootstrapTable({
        url: 'Recruitments/getEvents',
        onClickRow: function (data, row) {
            var position = $('#position').val();
            var link = 'userSchedulesSeminar';
            if (position === 'admin') {
                link = 'events';
            }
            window.location = link;
        },
        rowStyle: function rowStyle() {
            return {
                css: {'cursor': 'pointer'}
            };
        },
        columns: [{
            field: 'company_name',
            title: 'Company'
        }, {
            field: 'event_type',
            title: 'Event'
        }, {
            field: 'sched_date',
            title: 'Date',
            formatter: function (data) {
                date = new Date(data);
                var monthNames = [
                    "January", "February", "March",
                    "April", "May", "June", "July",
                    "August", "September", "October",
                    "November", "December"
                ];

                var day = date.getDate();
                var monthIndex = date.getMonth();
                var year = date.getFullYear();

                return monthNames[monthIndex] + ' ' + day + ' ' + year;
            }
        }, {
            field: 'location',
            title: 'Location'
        }]
    });

    //messages
    $('#messages').bootstrapTable({
        url: 'Recruitments/viewMessages',
        onClickRow: function (data, row) {
            var email = data.email;
            var message = data.message;
            $('#email').html(email);
            $('#message').html(message);
            toggleDiv($('#vMsg'),$('#msgtbl'));
        },
        rowStyle: function rowStyle() {
            return {
                css: {'cursor': 'pointer'}
            };
        },
        columns: [ {
            field: 'name',
            title: 'Sender'
        },{
            width: '20%',
            field: 'timestamp',
            title: ''
        }]
    });


    //company options
    //on change options
    $('#schedTypeOpts').change(function () {
        $eventType = $(this).val();
        $scheduleTable.bootstrapTable('refresh', {url: 'Recruitments/getSchedule/schedules/' + $eventType});
    });
    $('#eventTypeOpts').change(function () {
        $eventType = $(this).val();
        $eventTable.bootstrapTable('refresh', {url: 'Recruitments/getSchedule/events/' + $eventType});
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
    // users table
    var $userTable = $('#usersTable');
    $userTable.bootstrapTable({
        url: 'Recruitments/getUsers/registered',
        onClickRow: function (data, row) {
            userDetails(data);
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

    $('#historyTBL').bootstrapTable({
        url: 'Recruitments/logs',
        pagination: true,
        columns: [{
            width: '30%',
            field: 'timestamp',
            title: 'Timestamp',
            formatter: function (date) {
                var date = new Date(date);
                var options = {
                    weekday: "long", year: "numeric", month: "short",
                    day: "numeric", hour: "2-digit", minute: "2-digit"
                };

                return date.toLocaleTimeString("en-us", options);
            }
        }, {
            width: '50%',
            field: 'activity',
            title: 'Activity',

        }, {
            width: '20%',
            field: 'name',
            title: 'User'
        }]
    });

    //on change status
    $('#userStatus').change(function () {
        var $status = $(this).val();
        if ($status === 'pending') {
            $userTable.bootstrapTable('destroy');
            $userTable.bootstrapTable({
                url: 'Recruitments/getUsers/' + $status,
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
                    field: 'id_num',
                    title: 'Action',
                    formatter: function (data) {
                        return '<button onclick="userAction(' + data + ',0)" class="btn btn-primary">Accept</button>' +
                            '<button onclick="userAction(' + data + ',1)" class="btn btn-primary">Deny</button>';
                    }
                }]
            });

        } else if ($status === 'registered') {
            $userTable.bootstrapTable('destroy');
            $userTable.bootstrapTable({
                url: 'Recruitments/getUsers/' + $status,
                onClickRow: function (data, row) {
                    userDetails(data);
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
        } else if ($status === 'archived') {
            $userTable.bootstrapTable('destroy');
            $userTable.bootstrapTable({
                url: 'Recruitments/getUsers/' + $status,
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
                    field: 'id_num',
                    title: 'Action',
                    formatter: function (data) {
                        return '<button onclick="userAction(' + data + ',2)" class="btn btn-success">Revert</button>';
                    }
                }]
            });
        }
    });

    //archive user
    $('#archiveUser').click(function () {
        var id = $('#saveBtn').val();
        $.ajax({
            url: 'Recruitments/archiveUser/' + id,
            success: function () {
                $userTable.bootstrapTable('refresh', {url: 'Recruitments/getUsers/registered'});
                toggleDiv($('#main'), $('#details'));
                alert('User archived.');
            }
        });
    });


    $('#addSchedule').on('show.bs.modal', function () {
        var dates = [];
        var index;
        var indexes = [];
        var i = -1;
        var date = $('#schedDate');
        var startTime = $('#start_time');
        var endTime = $('#end_time');
        var loc = $('#loc');
        var r = $('#r');
        var counter = 0;
        $.ajax({
            url: 'Recruitments/validateSched',
            dataType: 'JSON',
            success: function (result) {
                result.forEach(function (list) {
                    dates.push(list.sched_date);
                });
                $('.valSched').on('submit', function () {
                    while ((i = dates.indexOf(date.val(), i + 1)) != -1) {
                        indexes.push(i);
                    }
                    indexes.forEach(function (ind) {
                        console.log('i:'+ind);
                        if (loc.val() === result[ind].location && r.val() === result[ind].room) {
                            if (startTime.val() === result[ind].start_time) {
                                counter++;
                            } else if (startTime.val() < result[ind].start_time) {
                                if (endTime.val() > result[ind].start_time) {
                                    counter++;
                                }
                            }else if(startTime.val()> result[ind].start_time){
                                if(endTime.val() <= result[ind].end_time){
                                    counter++;
                                }
                            }
                        }
                    });
                    if(counter > 0){
                        console.log(counter);
                        alert('There is a conflict in the schedule. Please change the time or location.');
                        counter = 0;
                        return false;
                    }
                });
            }
        });
    })


});

function formatTime(data) {

}


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
    $('#companyImage').attr('src', './uploads/' + data.image_url);
    $('#address').html(data.address);
    $('#contact_person').html(data.contact_person);
    $('#mobile_num').html(data.mobile_num);
    $('#tel').html(data.tel_num);
    $('#alt_number').html(data.alt_number);
    $('#email').html(data.email);
    if (data.about !== null) {
        $('#desc').html(data.about);
    } else {
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
    $('#company').html(data.company);
    $('#eventType').html(data.type);
    $('#date').val(data.date);
    $('#time').val(data.time);
    $('#location').val(data.location);
    $('#room').val(data.room);
    $('#slots').val(data.slots);
    $('#schedSub').val(data.sched_id);
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
            alert('Company has been removed from the list.');
        }
    });

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
function appointmentAction($sched_id, $action) {
    $.ajax({
        url: 'Recruitments/userAppointments/' + $sched_id + '/' + $action,
        success: function (result) {
            if (result === 'false') {
                alert('There is a conflict in your time. Please choose a different schedule.');
            } else {
                location.reload();
            }
        }
    })
}

//view company
function userCompanydetails(data) {
    $('#info').removeAttr('hidden');
    $('#noComp').attr('hidden', 'hidden');
    $('#address').html(data.address);
    $('#contact').html(data.mobile_num);
    $('#companyImage').attr('src', './uploads/' + data.image_url);
    if (data.about !== null) {
        $('#aboutUs').html(data.about);
    } else {
        $('#aboutUs').html('No description.');
    }

}

function userDetails(data) {
    toggleDiv($('#details'), $('#main'));
    if (data.user_type === 'admin') {
        $('#userDv').attr('hidden', 'hidden');
        $('#yearDv').attr('hidden', 'hidden');
    }
    $('#firstname').val(data.first_name);
    $('#lastname').val(data.last_name);
    $('#id_num').val(data.id_num);
    $('#user_type').val(data.user_type);
    $('#course').val(data.course);
    $('#year').val(data.year);
    $('#saveBtn').val(data.user_id);

}


//user Action
function userAction($user_id, $action) {
    $.ajax({
        url: 'Accounts/userAction/' + $user_id + '/' + $action,
        success: function (result) {
            if ($action === 0) {
                $('#usersTable').bootstrapTable('refresh', {url: 'Recruitments/getUsers/pending'});
            } else if ($action === 2) {
                $('#usersTable').bootstrapTable('refresh', {url: 'Recruitments/getUsers/archived'});
            } else {
                $('#usersTable').bootstrapTable('refresh', {url: 'Recruitments/getUsers/registered'});
            }
        }
    });
}

function printToPDF() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();


    if (dd < 10) {
        dd = '0' + dd
    }

    if (mm < 10) {
        mm = '0' + mm
    }

    dateCreated = '<p>Date Created: ' + mm + '/' + dd + '/' + yyyy + '</p>';


    $('#appointments').bootstrapTable('togglePagination');
    var printContents = $('#nav-registered').find('.fixed-table-body').html();
    var company = $('#company').text();
    var eventType = $('#eventType').text();
    var date = $('#date').val();
    var time = $('#time').val();
    var location = $('#location').val();
    var room = $('#room').val();

    dateTime = '<p class="col-12">Date and Time: ' + date + ' : ' + time + '</p>';
    locactionAndRoom = '<p class="col-12">Location and Room: ' + location + ' : ' + room + '</p>';


    document.body.innerHTML = '<div class="text-center"><h2>List of Registered Users on ' + company + ' ' + eventType +
        '</h2></div><div class="row">' + locactionAndRoom + dateTime + '</div>' + printContents + '<footer class="fixed-bottom">' + dateCreated + '</footer>';


    window.print();
    window.location.reload(true);
}

function checkSchecule() {
    alert('');
}