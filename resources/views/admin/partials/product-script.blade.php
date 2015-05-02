<script>
    editProduct = window.editProduct || {};

    //Add/Edit product form validation params.
    editProduct.requiredFields = [
        'sku',
        'name',
        'price',
        'shipping_cost',
    ];

    editProduct.errors = [];

    /**
     * Handle form validation for add/edit product forms.
     */
    editProduct.validateForm = function()
    {
        var l = editProduct.requiredFields;
        for(var f in l)
        {
            var i = 'input[name="' + l[f] + '"]';
            var jField = $(i);

            if(!jField.val().length)
            {
                editProduct.errors.push(l[f]);
            }
        }

        //Return false if there are errors
        if(editProduct.errors.length)
        {
            editProduct.displayErrors();
            return false;
        }
        //Reset the error array
        editProduct.errors = [];
        return true;
    }

    /**
     * Display any form errors.
     */
    editProduct.displayErrors = function()
    {
        //Remove existing error messages
        $('div.primary-error').remove();
        //Construct the error message div
        var error = '<div class="row primary-error">';
        error += '<div class="col-sm-12 alert alert-danger">';
        error += '<h1>Error <span class="glyphicon glyphicon-exclamation-sign"></span></h1>';
        error += '<ul>';

        //Construct a list item for each error
        for(var e in editProduct.errors)
        {
            error += '<li>';
            error += 'The ' + editProduct.errors[e] + ' field is required.';
            error += '</li>';
        }

        error += '</ul>';
        error += '</div>';
        error += '</div>';

        //Reset the error array
        editProduct.errors = [];

        //Add the error div to the DOM
        $('div.main-container').prepend(error);
    }


    /**
     * Handle form submission.
     */
    $(document).on("submit", ".primary-form", function (e) {
        var v = editProduct.validateForm();
        if(!v)
        {
            e.preventDefault();
            return false;
        }
           return true;
    });

    /**
     * Reset the manufacturers list with the latest list from the server.
     */
    editProduct.resetManufacturerList = function()
    {
        $.get('/admin/products/manufacturers', '#new-manufacturer-modal', function(d)
        {
            var newManList = '';
            $.each(d, function(i,v)
            {
                newManList += '<option value="' + i + '">' + v + '</option>';
            });
            $('select[name="manufacturer_id"]').empty().append(newManList);
        });
    };

    /**
     * Reset the tax list with the latest list from the server.
     */
    editProduct.resetTaxList = function()
    {
        $.get('/admin/products/tax', function(d)
        {
            var newTaxList = '';
            $.each(d, function(i,v)
            {
                newTaxList += '<option value="' + i + '">' + v + '</option>';
            });
            $('select[name="tax_id"]').empty().append(newTaxList);
        });
    };

    /**
     * Reset the categories list with the latest list from the server.
     */
    editProduct.resetCategoryList = function()
    {
        $.get('/admin/products/categories', function(d)
        {
            var newCatList = '';
            $.each(d, function(i,v)
            {
                newCatList += '<option value="' + i + '">' + v + '</option>';
            });
            $('select[name="category_id"]').empty().append(newCatList);
        });
    };

    /**
     * Wrap the error in a Bootstrap alert div.
     *
     * @param e
     * @returns {string}
     */
    editProduct.displayModalError = function(e)
    {
        var error = '<div class="alert alert-danger add-error" role="alert">';
        error += '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
        error += '<span class="sr-only">Error:</span>';
        error += e;
        error += '</div>';

        return error;
    }

    /**
     * Update the tax dropdown list after modal window closes.
     */
    $(document).on('hide.bs.modal', '#new-tax-modal', function(e)
    {
        editProduct.resetTaxList();
    });

    /**
     * Update the manufacturer dropdown list after modal window closes.
     */
    $(document).on('hide.bs.modal', '#new-manufacturer-modal', function(e)
    {
        editProduct.resetManufacturerList();
    });

    /**
     * Update the category dropdown list after modal window closes.
     */
    $(document).on('hide.bs.modal', '#new-category-modal', function(e)
    {
        editProduct.resetCategoryList();
    });

    /**
     * Handle manufacturer form submission.
     */
    $(document).on("submit", ".modal-form", function (e) {
        //Check that the field has a value before attempting submission.
        var f = $(this).find('input.add').val();
        if(f.length === 0)
        {
            var msg = 'Please enter a value.';
            editProduct.removeError();
            $(this).find("label").after(editProduct.displayModalError(msg));
            e.preventDefault();
            return false;
        }
        editProduct.sendRequest($(this));
        e.preventDefault();
        return false;
    });

    /**
     * Update the modal window content.
     *
     * @param o
     */
    editProduct.updateView = function(o)
    {
        o.find('input.submit-modal').removeClass('btn-primary').addClass('btn-success').val("Success");
        //Hide the form after a slight delay
        setTimeout(function()
        {
            o.parents('.modal').modal('hide');
        }, 1000);
    }

    /**
     * Reset the modal form to its original state.
     */
    $(document).on('hide.bs.modal', '.modal', function()
    {
        editProduct.removeError();
        $(this).find('input.add').val('');
        $(this).find('input.submit-modal').removeClass('btn-success').addClass('btn-primary').val("Add");
    });

    /**
     * Remove the error message if it exists.
     */
    editProduct.removeError = function()
    {
        var e = $('div.add-error');
        if(e.length)
        {
            e.remove();
        }
    }

    /**
     * Submit the form via AJAX.
     *
     * @param o
     */

    editProduct.sendRequest = function(o){
        $.ajax({
            url: o.attr('action'),
            type: o.attr('method'),
            data: o.serialize(),
            success: function(d, s, x)
            {
                //Handle the response according to its status
                switch(d.status)
                {
                    case 'success':
                        editProduct.removeError();
                        editProduct.updateView(o);
                        break;
                    case 'required':
                        var msg = 'Please enter a value.';
                        editProduct.removeError();
                        o.find("label").after(editProduct.displayModalError(msg));
                        return false;
                        break;
                    case 'unique':
                        var msg = 'Please enter a unique value.';
                        editProduct.removeError();
                        o.find("label").after(editProduct.displayModalError(msg));
                        return false;
                        break;
                    default:
                        var msg = 'An error has occurred.';
                        editProduct.removeError();
                        o.find("label").after(editProduct.displayModalError(msg));
                        return false;
                }
            }
        });
    }
</script>