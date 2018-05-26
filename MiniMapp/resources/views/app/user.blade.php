{
  "$jason": {
    @include('app.includes.head', [
                                    'title' => 'User', 
                                    'actions' => 'app.user_actions',
                                    'templates' => 'app.user_body'
                                  ]
            )
  }
}