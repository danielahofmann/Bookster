    @extends ('layouts.master')

    @section('pageTitle')
        <title>{{ config('app.name', 'Bookster') }} - Bitte Alter wählen</title>
    @stop

    @section('body')
        <h1>Bitte wählen Sie ihr Alter aus.</h1>
        <age-circle @choose="saveAgeToSession"
                age="0 bis 7"
        ></age-circle>

        <age-circle @choose="saveAgeToSession"
                    age="8 bis 12"
        ></age-circle>

        <age-circle @choose="saveAgeToSession"
                    age="13 bis 18"
        ></age-circle>

        <age-circle @choose="saveAgeToSession"
                    age="19 bis 50"
        ></age-circle>

        <age-circle @choose="saveAgeToSession"
                    age="51 bis 65"
        ></age-circle>

        <age-circle @choose="saveAgeToSession"
                    age="über 65"
        ></age-circle>

        <age-slider></age-slider>
    @stop