@extends('layouts.dashboard')

@section('scripts_head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection

@section('scripts_footer')
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
    <script defer>
        // Call the dataTables jQuery plugin
        jQuery(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection


@section('content')
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>UserName</th>
            <th>Email</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>UserName</th>
            <th>Email</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{  !empty($user->first_name) ? $user->first_name : 'N/A' }}</td>
            <td>{{  !empty($user->last_name)  ? $user->last_name  : 'N/A' }}</td>
            <td>{{  !empty($user->user_name)  ? $user->user_name  : 'N/A' }}</td>
            <td>{{  !empty($user->email)      ? $user->email      : 'N/A' }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
