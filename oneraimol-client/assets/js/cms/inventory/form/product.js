$( document ).ready(
    function() {
        $( '#product-form' ).validate(
            {
                rules : {
                    name            : 'required',
                    description     : 'required',
                    package_size    : 'required',
                    liters          : 'required',
                    datestock      : 'required',
                    expiration_date : 'required'
                },
                messages : {
                    name          : message.required,
                    description   : message.required,
                    package_size  : message.required,
                    liters        : message.required,
                    datestock    : message.required,
                    expiration_date : message.required
                },
                submitHandler : function() {
                    submit_product();
                },
                errorPlacement: function( error, element ) {
                    element.closest('tr')
                           .find('span:last')
                           .append( error );
                }
            }
        );
    }
);