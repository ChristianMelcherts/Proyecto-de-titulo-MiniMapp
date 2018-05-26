"head": {
            "title": "{{$title or 'MiniMapp'}}",
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

            @if(isset($actions) && !isset($templates))
            ,

            "actions" : {
                @include($actions)
            }
            @endif

            @if(isset($templates))

                @if(isset($actions))
                ,
                "actions" : {
                        @include($actions)
                }
                @endif
            ,
            "templates" : {
                @include($templates)
            }
            @endif
        }