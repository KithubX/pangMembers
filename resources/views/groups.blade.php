<!doctype html>
<html lang="{{ app()->getLocale() }}">
<!DOCTYPE html>
<html>
    <head>
        <title>Admin - Groups pangMembers</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <style>
            #members-table td {
                cursor:pointer;
            }
        </style>
        <!-- Firebase -->
        <script src="https://www.gstatic.com/firebasejs/4.12.0/firebase.js"></script>
        <script src="/js/firebase.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <h1>pangMembers</h1>
            <div class="row">
                <div class="col-md-2">
                    <div id="list-example" class="list-group">
                      <a class="list-group-item list-group-item-action" href="/">Members</a>
                      <a class="list-group-item list-group-item-action active" href="/groups">Groups</a>
                      <a class="list-group-item list-group-item-action logout-link" href="#">Logout</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <h3>Members</h3>
                    <table id="members-table" class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Group Name</th>
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
    </body>
</html>
