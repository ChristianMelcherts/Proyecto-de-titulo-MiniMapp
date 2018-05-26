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
                @foreach($flags as $flag)
                  
                  {
                    "type" : "horizontal",
                    "components" : [
                      {
                        "type" : "label",
                        "text" : "{{$flag->flag}}"
                      },
                      {
                        "type"  : "space"
                      },
                      {
                        "type" : "switch",
                        "value" : "<?php echo ((isset($flag->activo) && $flag->activo == 1) ? 'true' : 'false') ?>",
                        "name" : "switch_{{$flag->id_flags}}"
                        , "action" : {
                          "type" : "$network.request",
                          "options" : {
                            "url" : "@endpoint/MiniMappUserFlag",
                            "method" : "post",
                            "data" : {
                              "id_flags" : "{{$flag->id_flags}}",
                              "id_usuario" : "{{$flag->id_usuario}}",
                              "activo" : "<?php echo '{{$get.switch_' . $flag->id_flags . '}}' ?>"
                            }
                          }
                        }
                        
                      }
                    ]
                  }  

                  @if(!$loop->last)
                  , {{-- separate array items--}}
                  @endif

                @endforeach
          ]
        }
      ],
      @include('app.includes.footer')
    }
      