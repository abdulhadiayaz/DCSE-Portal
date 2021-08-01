@component('mail::message')
# Introduction

Hi, {{ $data['friend_name'] }},
{{ $data['your_name'] }}({{ $data['your_email'] }}) has refered you this job.

@component('mail::button', ['url' => $data['job_url']])
Open the Job
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
