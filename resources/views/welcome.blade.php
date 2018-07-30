<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>pangMembers</title>

        <!-- Bootstrap and jQuery -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            #members-table tr {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <nav id="navbar-pangmembers" class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="#">pangMembers</a>
        </nav>

        <br/>

        <div class="container-fluid login screen">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>pangMembers Login</h3>
                            <div id="login-status-message"></div>
                            <form id="login-form" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="john@smith.com" placeholder="Email" required />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" value="johnsmith.123" placeholder="Password" required />
                                </div>
                                <input type="submit" class="btn btn-primary" value="Login" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid members screen">
            <div class="row">
                <div class="col-md-2">
                    <div class="list-group">
                        <a class="list-group-item active" href="#members">Members</a>
                        <a class="list-group-item" href="#logout">Logout</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div id="members-list-screen">
                        <h3>Members</h3>
                        <button type="button" id="members-add-button" class="btn btn-primary">Add Members</button>
                        <hr/>
                        <table id="members-table" class="table table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Updated At</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5">There are no members.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="members-add-screen">
                        <h3>Add Members</h3>
                        <div id="add-member-status-message"></div>
                        <div class="col-md-6">
                            <form id="members-add-form" method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="" placeholder="Phone">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Add Member"/>
                                <button type="button" class="btn btn-light cancel-button">Cancel</button>
                            </form>
                        </div>
                    </div>
                    <div id="members-edit-screen">
                        <h3>Edit Members</h3>
                        <div id="edit-member-status-message"></div>
                        <div class="col-md-6">
                            <form id="members-edit-form" method="post">
                                <input type="hidden" name="id" value="" />
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Updated At</label>
                                    <p class="form-control-static updated-at"></p>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Created At</label>
                                    <p class="form-control-static created-at"></p>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Update Member"/>
                                <button type="button" class="btn btn-success send-sms" data-toggle="modal" data-target="#sms-modal">Send SMS</button>
                                <button type="button" class="btn btn-light cancel-button">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="sms-modal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form id="send-sms-form" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Send SMS</h5>
                    <div id="send-sms-status-message"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Send SMS Message to <span></span></p>
                    <textarea name="message" class="form-control"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Send SMS</button>
                  </div>
                </div>
            </form>
          </div>
        </div>

        <script>
            var AppState = {
                session: {
                    access_token: null
                },
                members: null,
            };

            var User = {
                login: function() {
                    let email = document.querySelector('#login-form [name=email]').value;
                    let password = document.querySelector('#login-form [name=password]').value;

                    $.ajax({
                        url: '/api/auth/login',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            "email": email,
                            "password": password,
                            "remember_me": true
                        }),
                        success: function(response) {
                            AppState.session = response;
                            sessionStorage.setItem("access_token", AppState.session.access_token);
                            sessionStorage.setItem("token_type", AppState.session.token_type);
                            sessionStorage.setItem("expires_at", AppState.session.expires_at);

                            User.checkAuth();
                        },
                        error: function(response, statusText) {
                            var loginStatusMessage = `<div class="alert alert-danger">${response.statusText}</div>`
                            $('#login-status-message').html(loginStatusMessage);
                        }
                    });
                },

                /**
                 * Display correct screen after checking authentication
                */
                checkAuth: function() {
                    AppState.session.access_token = sessionStorage.getItem('access_token');

                    Screen.hideScreens();
                    if (!AppState.session.access_token) {
                        Screen.displayLogin();
                    } else {
                        Screen.displayMembers();
                        Members.showList();
                    }
                },

                /**
                 * Logout User
                 */
                 logout: function() {
                    $.ajaxSetup({
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Authorization': `Bearer ${AppState.session.access_token}`
                        }
                    });

                    $.ajax({
                        url: '/api/auth/logout',
                        method: 'GET',
                        success: function(response) {
                            AppState = {
                                session: {
                                    access_token: null
                                },
                                members: null,
                            };

                            sessionStorage.clear();
                            Screen.hideScreens();
                            Screen.displayLogin();
                        }
                    });
                 }
            };

            var Members = {
                add: function() {
                    $.ajaxSetup({
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Authorization': `Bearer ${AppState.session.access_token}`
                        }
                    });

                    $.ajax({
                        url: '/api/v1/members',
                        method: 'POST',
                        data: JSON.stringify({
                            "name": $('#members-add-form [name=name]').val(),
                            "email": $('#members-add-form [name=email]').val(),
                            "phone": $('#members-add-form [name=phone]').val()
                        }),
                        success: function(response) {
                            var memberStatusMessage = `<div class="alert alert-success">${response.message}</div>`;
                            $('#add-member-status-message').html(memberStatusMessage);
                            setTimeout(function() {
                                Screen.displayMembers();
                                $('#add-member-status-message').hide();
                                Members.showList();
                            },2000);
                        }
                    });
                },

                update: function(memberId) {
                    $.ajaxSetup({
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Authorization': `Bearer ${AppState.session.access_token}`
                        }
                    });

                    $.ajax({
                        url: `/api/v1/members/${memberId}`,
                        method: 'PUT',
                        data: JSON.stringify({
                            "name": $('#members-edit-form [name=name]').val(),
                            "email": $('#members-edit-form [name=email]').val(),
                            "phone": $('#members-edit-form [name=phone]').val()
                        }),
                        success: function(response) {
                            var memberStatusMessage = `<div class="alert alert-success">${response.message}</div>`;
                            $('#edit-member-status-message').html(memberStatusMessage);
                            setTimeout(function() {
                                Screen.displayMembers();
                                $('#edit-member-status-message').hide();
                                Members.showList();
                            },2000);
                        }
                    });
                },

                showList: function() {
                    $.ajaxSetup({
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Authorization': `Bearer ${AppState.session.access_token}`
                        }
                    });

                    $.ajax({
                        url: '/api/v1/members',
                        method: 'GET',
                        beforeSend: function() {
                            let loadingMessage = '<tr><td colspan="5">Loading...</td></tr>';
                            $('#members-table tbody').html(loadingMessage);
                        },
                        success: function(response) {
                            let members = response.data;
                            var memberHtml = '';
                            members.forEach(function(member) {
                                memberHtml+= `<tr data-id="${member.id}">`;
                                memberHtml+= `<td>${member.name}</td>`;
                                memberHtml+= `<td>${member.email}</td>`;
                                memberHtml+= `<td>${member.phone}</td>`;
                                memberHtml+= `<td>${member.updated_at}</td>`;
                                memberHtml+= `<td>${member.created_at}</td>`;
                                memberHtml+= `<tr>`;
                            });
                            $('#members-table tbody').html(memberHtml);
                        }
                    });
                },

                showInfo: function(memberId) {
                    $.ajaxSetup({
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Authorization': `Bearer ${AppState.session.access_token}`
                        }
                    });

                    $.ajax({
                        url: `/api/v1/members/${memberId}`,
                        method: 'GET',
                        success: function(response) {
                            let member = response.data;
                            $('#members-edit-screen [name=id]').val(member.id);
                            $('#members-edit-screen [name=name]').val(member.name);
                            $('#members-edit-screen [name=email]').val(member.email);
                            $('#members-edit-screen [name=phone]').val(member.phone);
                            $('#members-edit-screen [class*=updated-at]').html(member.updated_at);
                            $('#members-edit-screen [class*=created-at]').html(member.created_at);
                        }
                    });
                },

                prepareSms: function(phone, message) {
                    $('#sms-modal .modal-body span').html(phone);
                    $('#sms-modal [name=message]').val(message);
                },

                sendSms: function(memberId, message) {
                    $.ajaxSetup({
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Authorization': `Bearer ${AppState.session.access_token}`
                        }
                    });

                    $.ajax({
                        url: `/api/v1/members/${memberId}/sms`,
                        method: 'POST',
                        data: JSON.stringify({
                            message: message,
                        }),
                        success: function(response) {
                            let responseMessage = `<div class="alert alert-success">${response.message}</div>`;
                            $('#send-sms-status-message').html(responseMessage);
                            $('#sms-modal').modal('hide');
                        }
                    });
                }
            };

            var Screen = {
                hideScreens: function() {
                    $('.screen').hide();
                },
                displayLogin: function() {
                    $('[class*="login screen"]').show();
                },
                displayMembers: function() {
                    $('[class*="members screen"]').show();
                    $('#members-list-screen').show();
                    $('#members-add-screen').hide();
                    $('#members-edit-screen').hide();
                },
                displayMembersAdd: function() {
                    this.hideScreens();
                    $('[class*="members screen"]').show();
                    $('#members-list-screen').hide();
                    $('#members-add-screen').show();
                    $('#members-edit-screen').hide();
                },
                displayMemberInfo: function(memberId) {
                    this.hideScreens();
                    $('[class*="members screen"]').show();
                    $('#members-list-screen').hide();
                    $('#members-add-screen').hide();
                    $('#members-edit-screen').show();
                    Members.showInfo(memberId);
                }
            };

            (function() {
                User.checkAuth();

                $('#login-form').submit(function(e) {
                    e.preventDefault();
                    User.login();
                });

                $('[href="#logout"]').click(function() {
                    User.logout();
                });

                $(document).on('click', '#members-table tr', function() {
                    let memberId = $(this).data('id');
                    Screen.displayMemberInfo(memberId);
                });

                $('#members-add-form').submit(function(e) {
                    e.preventDefault();
                    Members.add();
                    console.log('Added member!');
                });

                $('#members-edit-form').submit(function(e) {
                    e.preventDefault();
                    let memberId = $('#members-edit-form [name=id]').val();
                    Members.update(memberId);
                });

                $('#members-add-form .cancel-button,#members-edit-form .cancel-button').click(function() {
                    Screen.displayMembers();
                    Members.showList();
                });

                $('#members-add-button').click(function() {
                    Screen.displayMembersAdd();
                });

                $('#members-edit-form .send-sms').on('click', function() {
                    let phone = $('#members-edit-form [name=phone]').val();
                    let message = "Are you ready to go to the party?"
                    Members.prepareSms(phone, message);
                });

                $('#send-sms-form').on('click', function() {
                    let memberId = $('#members-edit-form [name=id]').val();
                    let message = $('#send-sms-form [name=message]').val();
                    Members.sendSms(memberId, message);
                });

            })();
        </script>
    </body>
</html>
