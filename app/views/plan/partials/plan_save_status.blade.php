@if( isset($flash_success) )
    {{ $flash_success }}
@endif

@if( isset($flash_error) )
    {{ $flash_error }}
@endif

Der Plan für Projektnummer {{ $project_number }} wurde gespeichert.