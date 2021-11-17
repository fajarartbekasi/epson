@component('mail::message')

<p>Hallo, {{$pembelian->user->name}}</p>
<p>Terimakasih telah melakukan pembelian di toko kami silahkan klik button dibawah ini untuk melakukan
upload pembayaran anda terimakasih
</p>
<P>Kode Pendaftaran : {{$pembelian->invoice}}</P>
@component('mail::button', ['url' => "http://epson.test/user/ambil-form/{$pembelian->id}"])
    upload pembayaran
@endcomponent
@endcomponent