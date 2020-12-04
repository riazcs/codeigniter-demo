                                               <form action="<?php echo base_url('Employee/insert_ldger')?>" method="post">
                                                 <fieldset>
                                                    <div class="form-group">
                                                        
                                                              <div class="row">
                                                                   
                                                                            <div class="col-sm-10 col-md-10">
                                                                            <label class="form-label">Multiple Identity:</label>
                                                                                <input type="text" class="form-control multiple_identity"  placeholder="Write identity..">
                                                                            </div>
                                                                            <input type="hidden" class="search_ledger_id">
                                                                            <input type="hidden" class="search_multiple_identity">
                                                                            
                                                                            <!-- <img id="related_image"> -->
                                                                            <div class="col-sm-2 col-md-2" style="margin-top: 22px">
                                                                                <button class="btn btn-primary" id="add_related_product"><i class="fa fa-plus"></i></button>
                                                                            </div>

                                                                            
                                                                            <br>
                                                                            <div class="rltd_prduct_div">
                                                                                <table class="table">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                    <th>Name</th>
                                                                                                    <!-- <input type="text" name="idenity"> -->
                                                                                                    <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody class="related_append_div">

                                                                                        </tbody>

                                                                                </table>
                                                                            </div>


                                                                 
                                                                <script type="text/javascript">
                                                                    var base = "<?php echo base_url() ?>";
                                                                //    var category_id = $("#product_category").val();
                                                                $(function() {
                                                                    $(".multiple_identity").autocomplete({
                                                                            source: function(request, response) {
                                                                                $.getJSON(base + "superman/accounts/ledger/ledger/search_multiple_identity", {
                                                                                        term: request.term
                                                                                },
                                                                                response);
                                                                            },
                                                                            minLength:  1,
                                                                            select: function(event, ui) {
                                                                                $(".multiple_identity").val(ui.item.label);
                                                                                $(".search_ledger_id").val(ui.item.ledger_id);
                                                                                // $(".search_product_code").val(ui.item.product_code);
                                                                                $(".search_multiple_identity").val(ui.item.multiple_identity);
                                                                                // $(".regular_repeat_product_code").val(ui.item.product_code);
                                                                                // $(".regular_color_list").html(ui.item.product_color);
                                                                                return false;
                                                                            }
                                                                    });
                                                                    //===============================to highlight matched word
                                                                    $.ui.autocomplete.prototype._renderItem = function(ul, item) {
                                                                            var t = String(item.value).replace(new RegExp(this.term, "gi"), "<b>$&</b>");
                                                                            return $("<li></li>").data("item.autocomplete", item).append("<a>" + t + "</a>").appendTo(ul);
                                                                    };
                                                                });
                                                                // End Product Autocomplete
                                                        </script>
                                                        <script type="text/javascript">
                                                                $(document).ready(function() {
                                                                    $('.rltd_prduct_div').hide();
                                                                    var max_fields = 200; //maximum input boxes allowed
                                                                    var wrapper = $(".related_append_div"); //Fields wrapper
                                                                    var add_button = $("#add_related_product"); //Add button ID
                                                                    var x = 1; //initlal text box count
                                                                    $(add_button).click(function(e) { //on add input button click
                                                                            $('.rltd_prduct_div').show();
                                                                            var pro_name = $('.multiple_identity').val();
                                                                            var pro_id = $('.multiple_identity').val();
                                                                            var pro_code = $('.search_multiple_identity').val();
                                                                            

                                                                            e.preventDefault();
                                                                            if (x < max_fields) { //max input box allowed
                                                                                //text box increment


                                                                                $(wrapper).append('<tr class="removes"><td><input type="text" name="multiple_identity[]" value="'+ pro_id + '">' + pro_name + '</td><td><a href="#" class="remove_field btn btn-xs btn-danger">Remove</a></td></tr>');
                                                                               // $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
                                                                                $('.multiple_identity').val('');

                                                                            }
                                                                            x++;

                                                                    });

                                                                    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                                                                            e.preventDefault();
                                                                            $(this).parent('td').parent('tr.removes').remove();
                                                                            x--;
                                                                    })
                                                                });
                                                        </script>
                                                        
                                                    </div>
                                            </div>
                                            
                                        </fieldset>
                                         <button type="submit" class="btn btn-xs btn-primary"> Submit Ledger </button>
                                     </form>