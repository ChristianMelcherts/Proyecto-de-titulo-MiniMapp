"head": {
            "title": "<?php echo e(isset($title) ? $title : 'MiniMapp'); ?>",
            "offline": "true",
            "styles": {
                "input": {
                    "align": "center",
                    "background": "#ffffff",
                    "color": "#3c3c3c",
                    "width": "100%",
                    "height": "60",
                    "font": "HelveticaNeue-Bold"
                }
            }

            <?php if(isset($actions) && !isset($templates)): ?>
            ,

            "actions" : {
                <?php echo $__env->make($actions, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            }
            <?php endif; ?>

            <?php if(isset($templates)): ?>

                <?php if(isset($actions)): ?>
                ,
                "actions" : {
                        <?php echo $__env->make($actions, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                }
                <?php endif; ?>
            ,
            "templates" : {
                <?php echo $__env->make($templates, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            }
            <?php endif; ?>
        }