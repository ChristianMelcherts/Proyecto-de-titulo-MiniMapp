{
  "$jason": {
    @include('app.includes.head', [
                                    'title' => 'Mapa', 
                                    'actions' => 'app.map_actions',
                                    'templates' => 'app.map_body'
                                  ]
            )
  }
}