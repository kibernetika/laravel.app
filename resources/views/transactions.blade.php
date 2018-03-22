@extends('layouts.app')
<link href="{!! asset('css/transactions.css') !!}" media="all" rel="stylesheet" type="text/css" />
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div id="content-page" class="content group">
                        <div class="hentry group">
                            <h3 class="title_page">Transactions list</h3>
                            <div class="short-table white">
                                <table style="width: 100%" cellspacing="0" cellpadding="0">
                                    <thead>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Created</th>
                                    </thead>
                                    @if($transactions_list)
                                        @foreach($transactions_list as $transaction)
                                            <tr>
                                                <td>{{ $transaction->transactionId }}</td>
                                                <td>{{$transaction->client->name}}</td>
                                                <td>{{ $transaction->amount }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                            </tr>
                                        @endforeach
                                        <div class="paginator">
                                            {{ $transactions_list->links() }}
                                        </div>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection