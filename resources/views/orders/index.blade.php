@extends('layout')

@section('content')
    <div class="raw">
        <div class="col-md-12">
            <a href="" class="btn btn-default pull-right">Logout</a>
        </div>
    </div>
<h1>Orders</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Name</th>
            <th>Address</th>
            <th>Items</th>
            <th>Grand Total</th>
            <th>Status</th>
        </tr>
        </thead>

        <tr>
            <td>1</td>
            <td>2018-02-15</td>
            <td><a href="mailto:john@example.com">John Smith</a></td>
            <td>4297 Ventura Drive</td>
            <td>
                <table class="table table-condensed">
                    <tr>
                        <td>Item name</td>
                        <td>2 pcs</td>
                        <td>$ 10</td>
                    </tr>
                    <tr>
                        <td>Item 2 name</td>
                        <td>1 pcs</td>
                        <td>$ 5</td>
                    </tr>
                </table>
            </td>
            <td>
                <strong>$25</strong>
            </td>
            <td>
                <span class="label label-success">Paid</span>
            </td>
        </tr>

        <tr>
            <td>1</td>
            <td>2018-02-15</td>
            <td><a href="mailto:john@example.com">John Smith</a></td>
            <td>4297 Ventura Drive</td>
            <td>
                <table class="table table-condensed">
                    <tr>
                        <td>Item name</td>
                        <td>2 pcs</td>
                        <td>$ 10</td>
                    </tr>
                </table>
            </td>
            <td>
                <strong>$20</strong>
            </td>
            <td>
                <span class="label label-danger">Failed</span>
            </td>
        </tr>
    </table>

@endsection