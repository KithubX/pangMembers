@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a class="list-group-item active" href="/">Members</a>
                <a class="list-group-item" href="/groups">Groups</a>
            </div>
        </div>
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h3>Members</h3>
                    <div class="btn-toolbar">
                        <a href="/members/add" class="btn btn-primary">Add Members</a>
                    </div>
                    <hr/>
                    <table id="members-table" class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Last Login</th>
                                <th>Date Registered</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">There are no members.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var Members = {
            all: function() {
                $.ajax({
                    url: '/api/users',
                    type: 'GET',
                    success: function(members, results) {
                        var membersHtml = '';
                        if (members.length > 0) {
                            members.forEach(function(member) {
                                membersHtml+= `<tr>`;
                                membersHtml+= `<td>${member.name}</td>`;
                                membersHtml+= `<td>${member.email}</td>`;
                                membersHtml+= `<td>${member.updated_at}</td>`;
                                membersHtml+= `<td>${member.created_at}</td>`;
                                membersHtml+= `</tr>`;
                            });
                            $('#members-table tbody').html(membersHtml);
                        } else {
                            membersHtml = `<tr><td colspan="4">There are no members.</td></tr>`;
                            $('#members-table tbody').html(membersHtml);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        };

        (function() {
            Members.all();
        })();
    </script>
</div>
@endsection
