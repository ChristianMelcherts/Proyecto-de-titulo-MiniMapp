  "body": {
      "style": {
        "border": "none",
        "background": "#cccccc"
      },
      "header": {
        "title": "Flags",
        "style": {
          "color": "#ffffff",
          "background": "#404040"
        }
      },
      "sections": [
        {
          "items": [
                <?php $__currentLoopData = $flags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  {
                    "type" : "horizontal",
                    "components" : [
                      {
                        "type" : "label",
                        "text" : "<?php echo e($flag->flag); ?>"
                      },
                      {
                        "type"  : "space"
                      },
                      {
                        "type" : "switch",
                        "value" : "<?php echo ((isset($flag->activo) && $flag->activo == 1) ? 'true' : 'false') ?>",
                        "name" : "switch_<?php echo e($flag->id_flags); ?>"
                        , "action" : {
                          "type" : "$network.request",
                          "options" : {
                            "url" : "http://f77d6301.ngrok.io/MiniMapp/public/api/MiniMappUserFlag",
                            "method" : "post",
                            "data" : {
                              "id_flags" : "<?php echo e($flag->id_flags); ?>",
                              "id_usuario" : "<?php echo e($flag->id_usuario); ?>",
                              "activo" : "<?php echo '{{$get.switch_' . $flag->id_flags . '}}' ?>"
                            }
                          }
                        }
                        
                      }
                    ]
                  }  

                  <?php if(!$loop->last): ?>
                  , 
                  <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
        }
      ],
      <?php echo $__env->make('app.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    }
      