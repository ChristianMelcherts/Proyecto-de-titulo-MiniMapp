{
  "$jason": {
    <?php echo $__env->make('app.includes.head', [
                                    'title' => 'User', 
                                    'actions' => 'app.user_actions',
                                    'templates' => 'app.user_body'
                                  ]
            , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  }
}