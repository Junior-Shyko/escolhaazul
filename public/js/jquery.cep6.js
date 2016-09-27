/**
 * jQuery CEP plugin v0.2
 * https://github.com/giovanneafonso/jquery.cep
 */

// TODO: Verificar se é necessário mudar para JSONP
//       por causa do cross domain do Internet Explorer
//       Exemplo aqui: http://www.eliezer.com.br/post/busca-de-cep-no-seu-form-apenas-com-javascript/

(function($) {
    /**
     * Web Service URL
     * Where we get CEP data
     */
    var ws_url = 'http://cep.republicavirtual.com.br/web_cep.php?formato=json&cep=';
    
    /**
     * PLugin instance
     */
    $.fn.cep6 = function(options) {
        
        /**
         * Default Settings
         */
        var settings = {
            autofill:       true,
            autofill_attr:  'data-cep',
            done:           function(responseCEP) {}
        };
        
        if(typeof options === 'object') {
            // Extend Options
            settings = $.extend(settings, options);
        } else if(typeof options === 'function') {
            // Only "done" Callback
            settings.done = options;
        }
        
        this.each(function()
        {
            var cepElement6 = $(this);
            
            // Track any changes
            cepElement6.on('keyup change', function() {
                // var cep = Only CEP Numbers
                var cep6 = CEPNumbers6(cepElement6.val());
                
                // Update field value with formatted CEP
                cepElement6.val(maskedCEP6(cep6));
                
                // When CEP is fully typed
                // Send request and retrieve data
                if(cep6.length === 8) {
                    cepElement6.attr('disabled', true);
                    
                    $.get(ws_url+cep6, function(responseCEP) {
                        // Autofill
                        
                        if(settings.autofill6) {
                            autoFill6(responseCEP, settings.autofill_attr);
                        }
                        
                        // Execute Callback
                        settings.done(responseCEP);
                    }).always(function() {
                        cepElement6.attr('disabled', false);
                    });
                }
            });
        });
        
        return this;
    };
    
    /**
     * Return only Numbers with max-length = 8
     *
     * @param number|string str Any number or string
     * @return string String with only numbers
     */
    function CEPNumbers6(str)
    {
        return str.toString().replace(/\D/g, '').substr(0,8);
    }
    
    /**
     * Returns formatted CEP
     *
     * @param number|string CEP Any number or string
     * @return string Formatted CEP string
     */
    function maskedCEP6(CEP)
    {
        var formattedCEP = '';
        var _CN = CEPNumbers6(CEP);
        
        if(_CN.length > 5) {
            formattedCEP = _CN.substr(0,5)+'-'+_CN.substr(5,3);
        } else {
            formattedCEP = _CN;
        }
        return formattedCEP;
    }
    
    /**
     * AutoFill inputs when a CEP is fetched
     */
    function autoFill6(responseCEP, attr)
    {
        $('['+attr+']').each(function() {
            var self  = $(this);
            var field = self.attr(attr);
            
            if(responseCEP[field]) {
                self.val(responseCEP[field]);
            }
        });
    }
})(jQuery);
