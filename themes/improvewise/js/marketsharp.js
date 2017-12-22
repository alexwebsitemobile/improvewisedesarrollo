function textCounter(field, spanId, maxlimit) {
    if (field.value.length > maxlimit)
    {
        field.value = field.value.substring(0, maxlimit);
        alert('Textarea value can only be ' + maxlimit + ' characters in length.');
        return false;
    } else
    {
        jQuery('#' + spanId).text('' + (maxlimit - field.value.length) + ' characters remaining');
    }
}

jQuery(document).ready(function () {
    jQuery.validator.addMethod(
            "phoneUS", function (phone_number, element) {
                phone_number = phone_number.replace(/\s+/g, "");
                return this.optional(element) || phone_number.length > 9 &&
                        phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            },
            "Please specify a valid phone number"
            );

    jQuery('#SubmitButton').click(function (evt) {
        var isValid = jQuery('form').valid();


        evt.preventDefault();

        if (isValid)
        {
            jQuery("div.error").hide();

            /*jQuery("body").append('<form id="form-to-submit" style="visibility:hidden;"></form>');
             jQuery("#form-to-submit").html(jQuery("#marketsharpmFieldSet").clone());*/

            var textareaData = new Array();
            jQuery.each(jQuery("#marketsharpmFieldSetDiv textarea"), function (index, value) {
                var cleanValue = escape(jQuery.trim(value.value));

                if (cleanValue !== '')
                    textareaData[value.name] = cleanValue;
            });

            var selectData = new Array();
            jQuery.each(jQuery("#marketsharpmFieldSetDiv select"), function (index, value) {
                var cleanValue = escape(jQuery.trim(value.value));

                if (cleanValue !== '')
                    selectData[value.name] = cleanValue;
            });

            /*var values = jQuery("#form-to-submit").serialize();*/
            var values = jQuery("#marketsharpmForm").serialize();

            if (values == '')
            {
                jQuery("body").append('<form id="form-to-submit" style="visibility:hidden;"></form>');
                jQuery("#form-to-submit").html(jQuery("#marketsharpmFieldSet").clone());

                values = jQuery("#form-to-submit").serialize();
            }

            /*Perform manual check for Phone or Email (at least one is required)*/
            var email = jQuery("#form-to-submit #MSM_email").val();
            var homePhone = jQuery("#form-to-submit #MSM_homephone").val();
            var cellPhone = jQuery("#form-to-submit #MSM_cellphone").val();
            var workPhone = jQuery("#form-to-submit #MSM_workphone").val();

            if (email === '' && homePhone === '' && cellPhone === '' && workPhone === '')
            {
                jQuery("div.error span").html("Phone or Email is required.");
                jQuery("div.error").show();
                return false; //short-circuit
            }

            for (var keyName in selectData) {
                var regEx = new RegExp("&" + keyName + "=[^&]*", "gi");
                var allSelectData = regEx.exec(values);
                values = values.replace(allSelectData, "&" + keyName + "=" + selectData[keyName]);
            }
            for (var keyName in textareaData) {
                var regEx = new RegExp("&" + keyName + "=[^&]*", "gi");
                var allInterestData = regEx.exec(values);

                values = values.replace(allInterestData, "&" + keyName + "=" + textareaData[keyName]);
            }

            values = values.replace(/&/g, "&|&");
            //console.log('values: ', JSON.stringify(values)); 

            /*jQuery("#form-to-submit").remove();*/

            jQuery.getJSON("https://ha.marketsharpm.com/LeadCapture/MarketSharp/LeadCapture.ashx?callback=?",
                    {"info": values, "version": 2},
                    function (data, msg) {
                        jQuery("div.error span").html("");
                        if (data.errors.length > 0)
                        {
                            jQuery.each(data.errors, function () {
                                jQuery("div.error span").append(this + "<br />");
                            });
                            jQuery("div.error span br:last").remove();
                            jQuery("div.error").show();
                        } else if (data.redirectUrl != '')
                        {
                            window.location.replace(data.redirectUrl);
                        } else if (data.msg == 'success')
                        {
                            $('#contact-fill').addClass('hidden');
                            $('#contet-form').addClass('hidden');
                            jQuery('#marketsharpmFieldSetDiv').html("<div id='message' class='post-content' style='text-align: center;'></div>");
                            jQuery('#message').html("<h3>THANK YOU</h3>")
                                    .append("<p>What's next? We'll start working on your estimate right away, once we have it ready we will contact you.</p>")
                                    .hide()
                                    .fadeIn(1500, function () {
                                        jQuery('#message').append("");
                                    });
                        } else
                        {
                            jQuery("div.error span").html("There was an unknown error submitting the form.");
                            jQuery("div.error").show();
                        }
                    }
            );
            return false;
        }
    });

    jQuery("form").validate({
        onsubmit: false,
        invalidHandler: function (e, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors == 1
                        ? 'You missed 1 field. It has been highlighted below'
                        : 'You missed ' + errors + ' fields. They have been highlighted below';
                jQuery("div.error span").html(message);
                jQuery("div.error").show();
            } else {
                jQuery("div.error").hide();
            }
        },
        onkeyup: false
    });
});
