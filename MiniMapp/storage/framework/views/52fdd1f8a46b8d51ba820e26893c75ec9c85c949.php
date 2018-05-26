{
  "$jason": {
    <?php echo $__env->make('app.includes.head', [
                                    'title' => 'Flags', 
                                    'actions' => 'app.flags_actions',
                                    'templates' => 'app.flags_body'
                                  ]
            , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  }
}