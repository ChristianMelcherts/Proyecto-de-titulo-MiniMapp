  "body": {
      "style": {
        "border": "none",
        "background": "#cccccc"
      },
      "header": {
        "title": "Usuario",
        "style": {
          "color": "#ffffff",
          "background": "#404040"
        }
      },
      "sections": [
        {
          "items": [
                {
                  "type" : "horizontal",
                  "components" : [
                    {
                      "type" : "space"
                    },

                    {
                      "type" : "label",
                      "text" : "Nombre : <?php echo e($user->nombre); ?>"
                    },

                    {
                      "type" : "space"
                    }
                  ]
                },
                {
                  "type" : "horizontal",
                  "components" : [
                    {
                      "type" : "space"
                    },

                    {
                      "type" : "label",
                      "text" : "Correo : <?php echo e($user->correo); ?>"
                    },
                    
                    {
                      "type" : "space"
                    }
                  ]
                },
                {
                  "type" : "horizontal",
                  "components" : [
                    {
                      "type" : "space"
                    },

                    {
                      "type" : "label",
                      "text" : "Login : <?php echo e($user->login); ?>"
                    },
                    
                    {
                      "type" : "space"
                    }
                  ]
                },
                {
                  "type" : "horizontal",
                  "components" : [
                    {
                      "type" : "space"
                    },

                    {
                     "type": "button",
                      "style": {
                        "width": "100%",
                        "align": "center",
                        "font": "HelveticaNeue-Bold",
                        "size": "12",
                        "padding": "10",
                        "height": "60",
                        "background": "#87b87f",
                        "color": "#ffffff"
                      },
                      "text": "CERRAR SESIÓN",
                      "action": {
                        "type": "$href",
                        "options": {
                          "url": "http://f77d6301.ngrok.io/MiniMapp/public/api/MiniMappIndex",
                          "transition" : "replace"
                        }
                      }
                    },
                    
                    {
                      "type" : "space"
                    }
                  ]
                }
          ]
        }
      ],
      <?php echo $__env->make('app.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    }
      