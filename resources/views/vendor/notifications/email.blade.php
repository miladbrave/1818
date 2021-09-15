@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
    <div style="text-align: right;direction: rtl">
# @lang('با سلام')
    </div>
@endif
@endif

{{-- Intro Lines --}}
<div style="text-align: right;direction: rtl">
@foreach ($introLines as $line)
{{ $line }}
@endforeach
</div>

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
<div style="text-align: right;direction: rtl">
@foreach ($outroLines as $line)
{{ $line }}

@endforeach
</div>
{{-- Salutation --}}
<div style="text-align: right;direction: rtl">
@if (! empty($salutation))
{{ $salutation }}
@else
   اذر یدک ریو<br>

        {{ config('app.name') }}

@endif
</div>
{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "اگر دکمه بازیابی رمز عبور کار نرد یا دارای مشکل بود لطفا لینک زیر را در مرورگر خود کپی پیست کنید.",
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent

