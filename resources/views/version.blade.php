@if (config('app.env') == 'development')
    Development Version
@elseif (config('app.env') == 'testing')
    Testing Version
@elseif (config('app.env') == 'production')
    App v2 - [03.2024]
@endif
