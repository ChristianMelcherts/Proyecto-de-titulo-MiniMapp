{
  "$jason": {
    @include('app.includes.head', [
                                    'title' => 'Flags', 
                                    'actions' => 'app.flags_actions',
                                    'templates' => 'app.flags_body'
                                  ]
            )
  }
}