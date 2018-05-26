{
  "$jason": {
    "head": {
      "title": "MiniMapp Signup",
      "offline": "flase",
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
    },
    "body": {
      "style": {
        "border": "none",
        "background": "#cccccc"
      },
      "header": {
        "title": "Registro",
        "style": {
          "color": "#ffffff",
          "background": "#404040"
        }
      },
      "sections": [
        {
          "items": [
            {
              "type": "space",
              "height": "10"
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                }
              ]
            },
            {
              "type": "space",
              "height": "50"
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "textfield",
                  "name": "name",
                  "placeholder": "Nombre",
                  "class": "input"
                },
                {
                  "type": "space"
                }
              ]
            },
                        {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "textfield",
                  "name": "username",
                  "placeholder": "Usuario",
                  "class": "input"
                },
                {
                  "type": "space"
                }
              ]
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "textfield",
                  "name": "mail",
                  "placeholder": "Correo",
                  "class": "input"
                },
                {
                  "type": "space"
                }
              ]
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "textfield",
                  "name": "password",
                  "placeholder": "Contraseña",
                  "class": "input",
                  "style": {
                    "secure": "true"
                  }
                },
                {
                  "type": "space"
                }
              ]
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "textfield",
                  "name": "password2",
                  "placeholder": "Confirmar Contraseña",
                  "class": "input",
                  "style": {
                    "secure": "true"
                  }
                },
                {
                  "type": "space"
                }
              ]
            },

            {
              "type": "space",
              "height": "5"
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
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
                  "text": "CREAR CUENTA",
                  "action": {
                    "type": "$network.request",
                    "options": {
                      "url": "@endpoint/signup",
                      "method": "post",
                      "data": {
                        "name": "@{{$get.name}}",
                        "username": "@{{$get.username}}",
                        "mail": "@{{$get.mail}}",
                        "password": "@{{$get.password}}",
                        "password2": "@{{$get.password2}}"
                      }
                    },
                     "success": {
                      "type": "$util.banner",
                      "options": {
                        "type" : "info",
                        "title" : "Éxito",
                        "description": "Cuenta Creada"
                      },

                      "success" : {
                        "type" : "$href",
                        "options" : {
                          "transition" : "replace",
                          "url" : "@endpoint/MiniMappIndex"
                         }
                      }
                        
                    },
                    "error": {
                      "type": "$util.banner",
                      "options": {
                        "type": "error",
                        "title": "Error de Creación",
                        "description": "Usuario no pudo ser Creado."
                      }
                    }
                  }
              },
                      
                {
                  "type": "space"
                }
              ]
            }
          ]
        }
      ]
    }
  }
}