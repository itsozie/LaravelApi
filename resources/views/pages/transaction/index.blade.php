@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Transaction Total</th>
                                        <th>Transaction Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i =1; 
                                    ?>
                                    @forelse ($item as $item)
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>@currency($item->transaction_total)</td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <span class="badge badge-info">
                                            @elseif($item->transaction_status == 'SUCCES')
                                                <span class="badge badge-success">
                                            @elseif($item->transaction_status == 'FAILED')
                                                <span class="badge badge-info">
                                            @else
                                                <span class="badge badge-info">
                                            @endif
                                            {{ $item->transaction_status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($item->transaction_status =='PENDING')
                                                {{-- <a href="{{ route('transaction.status', $item->id) }} ? status=SUCCES" 
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-check"></i>
                                                </a>    
                                                <a href="{{ route('transaction.status', $item->id) }} ? status=FAILED" 
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-times"></i>
                                                </a>     --}}
                                            @endif
                                            <a  href="{{route('transaction.show', $item->id)}}"
                                                data-remote="{{route('transaction.show', $item->id)}}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Transaksi {{ $item->uuid }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href=" {{route('transaction.edit', $item->id)}} " class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            
                                            <form action=" {{route('transaction.destroy', $item->id)}} " method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    ?>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data Tidak Tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection