<table class="table table-bordered">
  <tr>
    <th>Nama</th>
    <td>{{ $transaction->name }}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{ $transaction->email }}</td>
  </tr>
  <tr>
    <th>Nomor</th>
    <td>{{ $transaction->number }}</td>
  </tr>
  <tr>
    <th>Alamat</th>
    <td>{{ $transaction->address }}</td>
  </tr>
  <tr>
    <th>Total Transaksi</th>
    <td>@currency($transaction->transaction_total)</td>
  </tr>
  <tr>
    <th>Status Transaksi</th>
    <td>{{ $transaction->transaction_status }}</td>
  </tr>
  <tr>
    <th>Pembelian Produk</th>
    <td>
      <table class="tabble table-bordered w-100">
        <tr>
          <th>Nama</th>
          <th>Tipe</th>
          <th>Harga</th>
        </tr>
        @foreach ($items as $detail)
            <tr>
              <td>{{ $detail->name }}</td>
              <td>{{ $detail->type }}</td>
              <td>@currency($detail->price)</td>
            </tr>
        @endforeach
      </table>
    </td>
  </tr>
</table>
{{-- <div class="row">
  <div class="col-4">
    <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
      <i class="fa fa-check"></i> Set Sukses
    </a>
  </div>
  <div class="col-4">
    <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-block">
      <i class="fa fa-times"></i> Set Gagal
    </a>
  </div>
  <div class="col-4">
    <a href="{{ route('transactions.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
      <i class="fa fa-spinner"></i> Set Pending
    </a>
  </div> --}}
</div>