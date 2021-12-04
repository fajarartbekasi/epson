@component('mail::message')

<p>Hallo, {{$pembelian->user->name}}</p>
<p>Terimakasih telah melakukan pembelian di toko kami silahkan klik button dibawah ini untuk melakukan
upload pembayaran anda terimakasih
</p>
<P>Kode Invoice : {{$pembelian->invoice}}</P>
@component('mail::button', ['url' => "http://localhost/epson/public/user/ambil-form/{$pembelian->id}"])
    upload pembayaran
@endcomponent
@endcomponent
