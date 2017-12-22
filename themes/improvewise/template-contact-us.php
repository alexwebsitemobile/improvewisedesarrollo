<div id="contact-container" class="container-gray pdtb30">
    <div class="container visible-sm visible-xs">
        <div class="row mgb30">
            <div class="col-xs-12 text-center">
                <?php
                $images = rwmb_meta('contact_us_icon', 'type=image&size=FULL');
                if (!empty($images)) {
                    foreach ($images as $image) {
                        echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                    }
                }
                ?>
                <h2 class="title-blue-md">Contact Us</h2>
            </div>
        </div>
    </div>
    <div class="contact-container pdtb30">
        <div class="container bg-gray-contact">
            <div class="row">
                <div class="col-xs-12 no-padding">
                    <?php
                    $name = get_option('theme_options_name');
                    $addr = get_option('theme_options_addr');
                    $city = get_option('theme_options_city');
                    $state = get_option('theme_options_state');
                    $zip = get_option('theme_options_zip');
                    $country = get_option('theme_options_country');
                    $tel = get_option('theme_options_tel');
                    $mail = get_option('theme_options_email');
                    $map = get_option('theme_options_map');
                    $map_url = get_option('theme_options_map_url');
                    ?>
                    <div class=" animated">
                        <div class="container no-padding">
                            <div class="col-md-3 col-sm-12 tg-verticalmiddle text-center-sm text-center-xs">
                                <div class="text-big" >
                                    <!--                                    <address style="margin-bottom: 10px;">
                                                                            <span class="tags-contact">
                                                                                <i class="fa fa-map-marker"></i> Address
                                                                            </span>
                                                                            <p><?php //echo $addr;  ?> <br> <span><?php //echo $city;  ?> </span> <span><?php //echo $state;  ?></span> <span><?php //echo $zip;  ?></span> <span><?php //echo $country;  ?></span></p>
                                                                        </address>-->
                                    <p>
                                        <span class="tags-contact">
                                            <i class="fa fa-phone"></i> Phone
                                        </span><br>
                                        <a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a>
                                    </p>
                                    <p>
                                        <span class="tags-contact">
                                            <i class="fa fa-envelope"></i> Email Address
                                        </span><br>
                                        <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12 no-padding tg-verticalmiddle">
                                <div class=" container-fluid">
                                    <div class="row mgb15">
                                        <div class="col-xs-12">
                                            <div class="box-contact pd30 container-white-with-show">
                                                <div class="row mgb30 hidden-sm hidden-xs">
                                                    <div class="col-xs-12 text-center">
                                                        <?php
                                                        $images = rwmb_meta('contact_us_icon', 'type=image&size=FULL');
                                                        if (!empty($images)) {
                                                            foreach ($images as $image) {
                                                                echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                                                            }
                                                        }
                                                        ?>
                                                        <h2 class="title-blue-md">Contact Us</h2>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                         <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.pack.js"></script> 
    <script>
        function textCounter( field, spanId, maxlimit ) {
          if ( field.value.length > maxlimit )
          {
            field.value = field.value.substring( 0, maxlimit );
            alert( 'Textarea value can only be ' + maxlimit + ' characters in length.' );
            return false;
          }
          else
          {
            jQuery('#'+spanId).text('' + (maxlimit - field.value.length) + ' characters remaining');
          }
        }

        jQuery(document).ready(function(){
            jQuery.validator.addMethod(
                "phoneUS", function(phone_number, element) {
                    phone_number = phone_number.replace(/\s+/g, ""); 
	                return this.optional(element) || phone_number.length > 9 &&
		                phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
                }, 
                "Please specify a valid phone number"
            );

            jQuery('#SubmitButton').click(function(evt) {
              var isValid = jQuery('form').valid();

              <!--if (!isValid)-->
              evt.preventDefault();
              
              if (isValid)
                {
                    jQuery("div.error").hide();
            
                    /*jQuery("body").append('<form id="form-to-submit" style="visibility:hidden;"></form>');
                    jQuery("#form-to-submit").html(jQuery("#marketsharpmFieldSet").clone());*/
                    
                    var textareaData = new Array();
                    jQuery.each(jQuery("#marketsharpmFieldSetDiv textarea"), function(index, value) {
                        var cleanValue = escape(jQuery.trim(value.value));

                        if (cleanValue !== '')
                            textareaData[value.name] = cleanValue;			
                    });

                    var selectData = new Array();
                    jQuery.each(jQuery("#marketsharpmFieldSetDiv select"), function(index, value) {
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

                    if(email === '' && homePhone === '' && cellPhone === '' && workPhone === '')
                    {
                        jQuery("div.error span").html("Phone or Email is required.");
                        jQuery("div.error").show();
                        return false; //short-circuit
                    }

                    for(var keyName in selectData) {
                        var regEx = new RegExp("&" + keyName + "=[^&]*", "gi");
                        var allSelectData = regEx.exec(values);
	                    values = values.replace(allSelectData, "&" + keyName + "=" + selectData[keyName]);
                    }
                    for(var keyName in textareaData) {
                        var regEx = new RegExp("&" + keyName + "=[^&]*", "gi");
                        var allInterestData = regEx.exec(values);

	                    values = values.replace(allInterestData, "&" + keyName + "=" + textareaData[keyName]);
                    }

                    values = values.replace(/&/g, "&|&");           
                    //console.log('values: ', JSON.stringify(values)); 

                    /*jQuery("#form-to-submit").remove();*/

                     jQuery.getJSON("https://ha.marketsharpm.com/LeadCapture/MarketSharp/LeadCapture.ashx?callback=?",  
                       { "info": values, "version" : 2 },
                       function(data, msg) {  
                        jQuery("div.error span").html("");
                        if (data.errors.length > 0)
                        {
                            jQuery.each(data.errors, function() {
                                jQuery("div.error span").append(this + "<br />");
                            });
                            jQuery("div.error span br:last").remove();
                            jQuery("div.error").show();
                        }                        
                        else if (data.redirectUrl != '')
                        {
                            window.location.replace(data.redirectUrl);
                        }
                        else if (data.msg == 'success')
                        {
                         jQuery('#marketsharpmFieldSetDiv').html("<div id='message' style='text-align: center;'></div>");  
                         jQuery('#message').html("<h2>Contact Information Submitted!</h2>")  
                         .append("<p>We will be in touch soon.</p>")  
                         .hide()  
                         .fadeIn(1500, function() {  
                           jQuery('#message').append("");  
                         });  
                        }
                        else
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
                invalidHandler: function(e, validator) {
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
    </script>
                                                    <div id="marketsharpmFormDiv">     
                                                        <form id="marketsharpmForm" method="post" action="https://ha.marketsharpm.com/LeadCapture/MarketSharp/LeadCapture.ashx">
                                                            <fieldset id="marketsharpmFieldSet" >
                                                                <div id="marketsharpmFieldSetDiv">  
                                                                    <div class="error" style="display:none;">
                                                                        <span></span><br clear="all" />
                                                                    </div> 
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <p>
                                                                                <input id="MSM_firstname" placeholder="First Name" type="text" name="MSM_firstname" class="required form-control" maxlength="50" />
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <p>
                                                                                <input placeholder="Last Name" id="MSM_lastname" type="text" name="MSM_lastname" class="required form-control" maxlength="50" />
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <p>
                                                                                <input placeholder="Phone" id="MSM_homephone" type="text" name="MSM_homephone" class="form-control phoneUS" maxlength="15" />
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <p>
                                                                                <input placeholder="Email" id="MSM_email" type="text" name="MSM_email" class="required form-control email" maxlength="100" />
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <p>
                                                                                <textarea rows="3" cols="30" id="MSM_custom_Interests" class="form-control" placeholder="Message" name="MSM_custom_Interests" /></textarea>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-xs-12">
                                                                            <p class="submit">
                                                                                <input type="submit" id="SubmitButton" name="submitbutton" value="Send Request" class="submit wpcf7-form-control wpcf7-submit btn btn-green btn-lg btn-block" />
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="MSM_source" value="90ed5254-a978-4208-b943-1204c3e31eed" />
                                                                    <input type="hidden" name="MSM_coy" value="2976" />
                                                                    <input type="hidden" name="MSM_formId" value="90ed5254-a978-4208-b943-1204c3e31eed" />
                                                                    <input type="hidden" name="MSM_leadCaptureName" value="MarketSharp" />
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>