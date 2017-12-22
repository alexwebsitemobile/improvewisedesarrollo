<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.pack.js"></script> 

<div id="marketsharpmFormDiv" class="estimate-form"> 
    <div class="body-pop-wrap">
        <div class="body-pop-bodies">
            <div class="body-pop modal-body-step-1 is-showing">
                <fieldset class="slider-form slider-one">
                    <div class="row">
                        <div id="contact-fill">
                            <div class="col-sm-6 tg-verticalmiddle">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <a href='#' class='fb' data-toggle="modal" data-target="#ModalShingle">
                                                <b>Step 1</b><br>
                                                Select a Shingle
                                            </a>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="ModalShingle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><?php
                                                            $vetted_professionals_image = rwmb_meta('image_popup_logo', 'type=image&size=FULL');
                                                            if (!empty($vetted_professionals_image)) {
                                                                foreach ($vetted_professionals_image as $image) {
                                                                    echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                                                                }
                                                            }
                                                            ?> &nbsp;Select a Shingle</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <?php
                                                            $taxonomia = array(
                                                                'products-categories',
                                                            );

                                                            $args = array(
                                                                'exclude' => array(178),
                                                                'order' => 'DESC',
                                                            );

                                                            $tax_terms = get_terms($taxonomia, $args);
                                                            $contador = 1;
                                                            foreach ($tax_terms as $tax_term) {
                                                                $termid = $tax_term->term_id;
                                                                $attachment_id = (array) get_term_meta($termid, '_thumbnail_id', true);
                                                                $image = wp_get_attachment_image_url(current($attachment_id), 'full');
                                                                $term_link = get_term_link($tax_term);
                                                                //var_dump($tax_term);
                                                                $price = get_term_meta($termid, 'products-price', true);
                                                                $popular = get_term_meta($termid, 'show_most_popular', true);
                                                                ?>
                                                                <article id="article-<?php echo $tax_term->term_id; ?>" class="text-center item-product col-sm-6 tt">
                                                                    <header>
                                                                        <a id="element-<?php echo $tax_term->term_id; ?>" onclick="showDetails(this)" data-shingle="<?php echo $tax_term->slug; ?>" data-element="<?php echo $contador; ?>" class="term" href="<?php echo $term_link ?>" title="<?php echo $tax_term->name; ?>">
                                                                            <?php if ($popular == 1) { ?>
                                                                                <span class="most-popular">
                                                                                    <i class="fa fa-star"></i> Most Popular
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if (!empty($image)) { ?>
                                                                                <img class="img-responsives-75" src="<?php echo $image ?>" alt="<?php echo $tax_term->name ?>">  
                                                                                <h4 class="title-min terms">
                                                                                    <?php echo $tax_term->name; ?>
                                                                                </h4>
                                                                                <p class="font-15">
                                                                                    <?php echo $tax_term->description; ?>
                                                                                </p>
                                                                                <p style="font-weight: 600;color: #9c3;">
                                                                                    <?php
                                                                                    if ($price == 1) {
                                                                                        ?>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <?php
                                                                                    } elseif ($price == 2) {
                                                                                        ?>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <?php
                                                                                    } elseif ($price == 3) {
                                                                                        ?>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <?php
                                                                                    } elseif ($price == 4) {
                                                                                        ?>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <?php
                                                                                    } elseif ($price == 5) {
                                                                                        ?>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                                                                    <?php } ?>
                                                                                </p>
                                                                            <?php } else { ?>
                                                                                <img class="img-responsives-75" src="<?php bloginfo('template_url'); ?>/images/not-category-image.png" alt="<?php echo $tax_term->name ?>">  
                                                                                <h4 class="title-min terms">
                                                                                    <?php echo $tax_term->name; ?>
                                                                                </h4>
                                                                                <p>
                                                                                    <?php echo $tax_term->description; ?>
                                                                                </p>
                                                                            <?php } ?>
                                                                        </a>
                                                                    </header>
                                                                </article>
                                                                <?php
                                                                $contador++;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <a href='#' class='fb' id="btn-color-enb-dsb" data-toggle="modal" data-target="#ModalColor">
                                                <b>Step 2</b><br>
                                                Select a Color
                                            </a>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="ModalColor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><?php
                                                            if (!empty($vetted_professionals_image)) {
                                                                foreach ($vetted_professionals_image as $image) {
                                                                    echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                                                                }
                                                            }
                                                            ?> &nbsp; Select a Color</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="ajax-response">
                                                            <div class="alert alert-warning">
                                                                <span>Please select a roof </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="MSM_firstname" class='fb' >
                                                <b>Step 3</b><br>
                                                Fill in contact info
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 tg-verticalmiddle text-center">
                                <div class="col-xs-12 tg-verticalmiddle">
                                    <div class="img-product">
                                        <img id="img-color-front" class="img-responsives" src="<?php echo content_url(); ?>/uploads/2017/09/Timberline_American_Harvest_Golden_Harvest.png">
                                    </div>
                                </div>
                                <div class="col-xs-12 tg-verticalmiddle">
                                    <div class="post-content">
                                        <p><b>Shingle:</b> <span id="shingle-name">Select a shingle</span></p>
                                        <p><b>Color:</b> <span id="color-name">Select a color</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
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
                         $('#contact-fill').addClass('hidden');
                                                            $('#contet-form').addClass('hidden');
                                                            jQuery('#marketsharpmFieldSetDiv').html("<div id='message' class='post-content' style='text-align: center;'></div>");
                                                            jQuery('#message').html("<h3>THANK YOU</h3>")
                                                                    .append("<p>What's next? We'll start working on your estimate right away, once we have it ready we will contact you.</p>").hide().fadeIn(1500, function () {
                                                                jQuery('#message').append("");
                                                            });
                                                            $('html, body').animate({
                                                                scrollTop: $(".container-white-with-show").offset().top - 100
                                                            }, 2000);
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
                                            <div class="col-sm-12">
                                                <p>
                                                    <input placeholder="Address" id="MSM_address1" class="required form-control" type="text" name="MSM_address1" maxlength="200" />
                                                </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>
                                                    <input placeholder="City" id="MSM_city" class="required form-control" type="text" name="MSM_city" maxlength="50" />
                                                </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>
                                                    <input placeholder="State" id="MSM_state" class="required form-control" type="text" name="MSM_state" maxlength="50" />
                                                </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>
                                                    <input placeholder="Zip" id="MSM_zip" type="text" name="MSM_zip" class="required form-control" maxlength="50" />
                                                </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>
                                                    <input placeholder="Phone" id="MSM_homephone" type="text" name="MSM_homephone" class="form-control phoneUS" maxlength="15" />
                                                </p>
                                            </div>
                                            <div class="col-sm-12">
                                                <p>
                                                    <input placeholder="Email" id="MSM_email" type="text" name="MSM_email" class="required form-control email" maxlength="100" />
                                                </p>
                                            </div>
                                            <div class="col-xs-12 hidden">
                                                <p>
                                                    <textarea placeholder="Interest In" rows="3" cols="30" id="MSM_custom_Interests" class="required form-control" name="MSM_custom_Interests"></textarea>
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <p>
                                                    <textarea placeholder="Special Requests" rows="3" cols="30" id="MSM_custom_Special_Request" class="form-control" name="MSM_custom_Special_Request"></textarea>
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="submit text-center" id="showprintpdf" style="display: none;">
                                                    <a class="submit wpcf7-form-control wpcf7-submit btn btn-green btn-lg btn-block" id="printPDF" href="#" target="_blank">Print PDF</a>
                                                </p>
                                                
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
                </fieldset>
            </div>
        </div>
    </div>
</div>

<?php
$varShingle = htmlspecialchars($_GET["id"]);
echo '<script languaje="JavaScript">
                  var varjs="' . $varShingle . '";
            </script>';
?>


<script>
    var value;
    function showDetails(value) {

        var element = value.getAttribute("data-element");
        $("a.term").removeClass("active-item");
        $("a.term-items").removeClass("active-item");
        $("#elemento-" + element).addClass("active-item");
        $("#elemento-" + element).addClass("active-item");
    }

    $("article.tt").each(function (index) {
        var anchor_element = $(this).attr("id");
        var anchor_a = $("#" + anchor_element).find(".term").attr("id");
        if (varjs === anchor_element) {
            $('#ModalShingle').modal('show');
            setTimeout(function () {
                document.getElementById(anchor_a).click();
            }, 800);
            
        }
    });

</script>

