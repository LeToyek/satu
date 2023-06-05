{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> Pengguna</a>
</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('kampanye') }}"><i class="nav-icon la la-bullhorn"></i>
        Kampanye</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('mitra') }}"><i class="nav-icon la la-handshake"></i>
        Mitra</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('funding') }}"><i
            class="nav-icon la la-file-invoice-dollar"></i> Pendanaan</a></li>
