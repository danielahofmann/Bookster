    @extends ('layouts.master')

    @section('pageTitle', 'Bitte wählen Sie Ihr Alter')

    @section('content')
        <h1>Bitte wählen Sie ihr Alter aus.</h1>
        <age-circle
                age="22"
        ></age-circle>
    @stop