@extends('layouts.app')

@section('content')
{{-- <input class="w-full date" type="text" placeholder="Select Date.."> --}}
<div class="flatpickr date">
    <input type="text" placeholder="Select Date.." data-input> <!-- input is mandatory -->

    <a class="input-button" title="toggle" data-toggle>
        C
    </a>

    <a class="input-button" title="clear" data-clear>
        X
    </a>
</div>
@endsection

@push('scripts')
<script>
    flatpickr(".date", {
        wrap: true,
        mode: "range",
        minDate: "today",
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        disable: [
            {
                from: "2021-08-21",
                to: "2021-08-23"
            },
            {
                from: "2021-08-25",
                to: "2021-08-27"
            }
        ]
    });
</script>
@endpush