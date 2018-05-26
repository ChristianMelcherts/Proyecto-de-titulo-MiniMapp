{
  "$jason": {
    <?php echo $__env->make('app.includes.head', [
                                    'title' => 'Mapa', 
                                    'actions' => 'app.map_actions',
                                    'templates' => 'app.map_body'
                                  ]
            , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  }
}