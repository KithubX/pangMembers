@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a class="list-group-item" href="/">Members</a>
                <a class="list-group-item active" href="/groups">Groups</a>
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
                    <h3>Groups</h3>
                    <div class="btn-toolbar">
                        <a href="/groups/add" class="btn btn-primary">Add Groups</a>
                    </div>
                    <hr/>
                    <table id="groups-table" class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">There are no groups.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var Groups = {
            all: function() {
                $.ajax({
                    url: '/api/groups',
                    type: 'GET',
                    success: function(groups, results) {
                        console.log(groups);
                        var groupsHtml = '';
                        if (groups.length > 0) {
                            groups.forEach(function(group) {
                                groupsHtml+= `<tr>`;
                                groupsHtml+= `<td>${group.name}</td>`;
                                groupsHtml+= `<td>${group.created_at}</td>`;
                                groupsHtml+= `</tr>`;
                            });
                            $('#groups-table tbody').html(groupsHtml);
                        } else {
                            groupsHtml = `<tr><td colspan="4">There are no groups.</td></tr>`;
                            $('#groups-table tbody').html(groupsHtml);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        };

        (function() {
            Groups.all();
        })();
    </script>
</div>
@endsection
