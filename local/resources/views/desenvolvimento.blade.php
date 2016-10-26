@extends('layouts.layout_proposal')

@section('content')
<style type="text/css">
    


</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <button type="button" id="myButton" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">
  Loading state
</button>

<button class="btn btn-primary btn-lg ladda-button" data-style="expand-right" data-size="l"><span class="ladda-label">large</span></button>
    </div>
</div>

{{-- <input type="button"  id="final_proposta" class="btn btn-primary btn-lg ladda-button pull-right" data-style="expand-right" data-size="l" onclick="return validaTermos()" value="Enviar Proposta" ><span class="ladda-label"></span> --}}

<script type="text/javascript">
    /*
Ref:
http://www.jqueryscript.net/demo/Buttons-with-Built-in-Loading-Indicators-For-Bootsrap-3-Ladda-Bootstrap/
*/

$(window).load(function(){
            // Bind normal buttons
            Ladda.bind( 'div:not(.progress-demo) button', { timeout: 4500 } );

            // Bind progress buttons and simulate loading progress
            Ladda.bind( '.progress-demo button', {
                callback: function( instance ) {
                    var progress = 0;
                    var interval = setInterval( function() {
                        progress = Math.min( progress + Math.random() * 0.1, 1 );
                        instance.setProgress( progress );

                        if( progress === 1 ) {
                            instance.stop();
                            clearInterval( interval );
                        }
                    }, 200 );
                }
            } );

            // You can control loading explicitly using the JavaScript API
            // as outlined below:

            // var l = Ladda.create( document.querySelector( 'button' ) );
            // l.start();
            // l.stop();
            // l.toggle();
            // l.isLoading();
            // l.setProgress( 0-1 );
});
</script>
@endsection
