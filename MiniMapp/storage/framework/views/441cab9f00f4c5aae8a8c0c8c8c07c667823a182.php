"body": {
      "style": {
        "border": "none",
        "background": "#cccccc"
      },
      "header": {
        "title": "MiniMapp",
        "style": {
          "color": "#ffffff",
          "background": "#404040"
        }
      },
      "sections": [
        {
          "items": [
                {
              "type": "map",
              "region": {
                "coord": "<?php echo e($latitude); ?>,<?php echo e($longitude); ?>",
                "width": "1500",
                "height": "1500"
              },
              "pins": [
                <?php $__currentLoopData = $pins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  {
                    "title": "<?php echo e($pin->login); ?> : <?php echo e($pin->nombre); ?>",
                    "description": "",
                    "coord": "<?php echo e($pin->latitud); ?>,<?php echo e($pin->longitud); ?>",
                    "style": {
                      "selected": "false"
                    }
                  }
                  <?php if(!$loop->last): ?>
                  , 
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              ],
              "style": {
                "width": "100%",
                "height": "80%"
              }
            }
          ]
        }
      ],
      <?php echo $__env->make('app.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    }
      